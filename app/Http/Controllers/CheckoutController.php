<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Cartitem;
use App\Models\Checkout;
use App\Models\Orderitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user   = auth()->user();
        // Ambil Id user yang sedang login
        $cart   = Cart::where('user_id', $user->id)->first();
        $cartitems = $cart ? $cart->cartitems()->with('product')->get() : collect();


        return view('checkout',compact('cart','cartitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // AMbil user yang seddang login
        $user = Auth::id();
        $cart = Cart::where('user_id', $user)->first();

        if(!$cart){
            return response()->json(['massage' => 'Keranjang Kosong' ],400);
        }

        $cartitems = Cartitem::where('cart_id',$cart->id)->with('product')->get();
        if ($cartitems->isEmpty()) {
            return response()->json(['message' => 'Tidak ada item di keranjang'], 400);
        }
        // Validatsi
        $request->validate([
            'no_hp'   => 'required',
            'address' => 'required',
        ]);
        DB::beginTransaction();
        try {
            // 1.Buat order baru
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_harga'   => $cart->cartitems()->sum('sub_total'),
                'status' => 'pending'
            ]);
            // 2. Simpan ke tabel Checkouts
        Checkout::create([
            'order_id' => $order->id,
            'no_hp'    => $request->no_hp,
            'address'  => $request->address,
        ]);
            // 2.Pindahkan cartitems ke orderitems
            foreach ($cartitems as $key => $cartitem) {
                Orderitem::create([
                    'order_id'  => $order->id,
                    'product_id' => $cartitem->product_id,
                    'product_varian_id' => $cartitem->product_varian_id,
                    'jumlah_product' => $cartitem->jumlah_product,
                    'price_at_product' => $cartitem->product->price,
                    'sub_total' => $cartitem->sub_total
                ]);
            }

            // 3. Hapus Cart items & crt setelah checkout
            Cartitem::where('cart_id',$cart->id)->delete();
            $cart->delete();

            DB::commit();
            return redirect()->route('berhasil.success');
             return response()->json(['message' => 'Checkout berhasil', 'order' => $order], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            // return response()->json(['message' => 'Checkout gagal', 'error' => $e->getMessage()], 500);
       
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function success()
    {
        return view('success');
    }
}
