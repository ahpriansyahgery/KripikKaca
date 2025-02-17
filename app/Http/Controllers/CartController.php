<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Cartitem;
use Illuminate\Http\Request;
use App\Models\ProductVarians;

class CartController extends Controller
{
    // Untuk Menambahkan product ke keranjang
    public function addToCart(Request $request, $productId)
    {
        
        if (!Auth::check()) {
            return redirect()->route('login.index')->with('error','Silahkan Login Terlebih dahulu');
        }

        // cek apakah user mempunyai kranjng
        $cart = Cart::where('user_id',Auth::id())->first();

        // Jika Tidak punya buat data baru
        if (!$cart) {
            $cart = Cart::create([
                'user_id'       => Auth::id(),
                'total_harga'   => 0,
            ]);
        }

        // Cek product
        $product = Product::findOrFail($productId);

        // Cek Varian Product
        $productvariansId = $request->input('product_varian_id');
        $productvarians = ProductVarians::findOrFail($productvariansId);

        $cartitems = Cartitem::where('cart_id',$cart->id)
                             ->where('product_id',$productId)
                            ->where('product_varian_id',$productvarians->id)
                            ->first();

        if ($cartitems) {
            $cartitems->jumlah_product += $request->jumlah_product;
            $cartitems->sub_total = $cartitems->jumlah_product * $productvarians->price_weight;
            $cartitems->save();
        }else{
            // Buat item baru
            $cartitems = Cartitem::create([
                'cart_id'   => $cart->id,
                'product_id' => $productId,
                'product_varian_id' => $productvarians->id,
                'jumlah_product' => $request->jumlah_product,
                'sub_total' =>  $request->jumlah_product *  $productvarians->price_weight,
            ]);
        }
        
        $this->calculateTotalHarga($cart);

        return response()->json([
            'success' => true,
            'message' => '<strong>' . $product->name . '</strong> berhasil ditambahkan ke keranjang!',
        ]);


    }

    // Untuk Nampilkan halaman cart

    public function viewCart()
    {
        $cart = Cart::where('user_id',Auth::id())->first();

        if ($cart) {
            $cartitems = $cart->cartitems()->with('product','productvarians')->get();
            // $productvarians = ProductVarians::all(); // Ambil semua varian produk

        }else{
            $cartitems = collect();
            // $productvarians = collect();
        }

        return view('cart',compact('cart','cartitems'));

    }


    // Untuk Menghitung Total Harga

    public function calculateTotalHarga(Cart $cart)
    {
        $totalHarga = $cart->cartitems()->sum('sub_total');

        // Update Total Harga
        $cart->total_harga = $totalHarga;
       
        $cart->save();
        return $totalHarga;
    }

// Logika Delete Product

    public function destroy(Request $request, $cartitemsId)
    {
        // Cari item di keranjang
    $cartitems = Cartitem::find($cartitemsId);

    if (!$cartitems) {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan'], 404);
        }
        return redirect()->route('cart.view')->with('Error', 'Item tidak ditemukan');
    }

    // Simpan ID Cart sebelum menghapus item
    $cartId = $cartitems->cart_id;
    $cartitems->delete(); // Hapus item

    // Perbarui total harga
    $cart = Cart::find($cartId);
    $totalHarga = 0; // Default 0 jika cart kosong

    if ($cart) {
        $totalHarga = $this->calculateTotalHarga($cart); // Pastikan fungsi ini mengembalikan nilai
    }

    // Jika request AJAX, kirim JSON response dengan total harga terbaru
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Item berhasil dihapus',
            'totalHarga' => $totalHarga,
        ]);
    }

    return redirect()->route('cart.view')->with('success', 'Item berhasil dihapus');
}


// Update Jumlah Product

public function updateCart(Request $request, $cartitemsId)
{
// Cari item cart
$cartitems = Cartitem::find($cartitemsId);

// Jika tidak ada maka kemblaikan
if (!$cartitems) {
    return response()->json([
        'success' => false,
        'message' => 'Item tidak ditemukan'
    ], 404);
}

// Jika ada maka jumlah product
$cartitems->jumlah_product   = $request->jumlah_product;
$cartitems->sub_total = $cartitems->jumlah_product * $cartitems->productvarians->price_weight;
$cartitems->save();

// Update total harga di cart
$cart = Cart::find($cartitems->cart_id);
if ($cart) {
    $this->calculateTotalHarga($cart);
}
return response()->json([
    'success' => true,
    'message' => 'Jumlah produk diperbarui!',
    'totalHarga' => $cart->total_harga,
    'subTotal' => $cartitems->sub_total,
]);

}


}
