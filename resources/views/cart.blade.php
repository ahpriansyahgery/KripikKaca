@extends('layouts.app')

@section('content')



<div class="container">
    <div class="extras d-flex justify-content-between">
        <h2>Keranjang Belanja</h2>
    <a href="{{ route('checkout.index') }}"><button type="button" class="btn btn-primary mb-2 " > Checkout </button></a>
    </div>
    <div class="card mb-5">
        <div class="card-body">
         

          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr  >
                <th scope="col">#</th>
                <th scope="col">Categorie</th>
                <th scope="col">Product</th>
                <th scope="col">Size</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Price</th>
                <th scope="col">SubTotal</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
             
           @forelse ($cartitems as $index => $cartitem)
    
          
           <tr id="cart-item-{{ $cartitem->id }}" class="cart-item-row" >
            <td class="item-number">{{ $loop->iteration }}</td> 
            {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
            <td>{{ $cartitem->product->categorie->name }}</td>
            <td>{{ $cartitem->product->name }}</td>
            <td>{{ $cartitem->productvarians->weight }}Kg</td>
            <td>
                <input type="number" class="update-cart" data-id="{{ $cartitem->id }}" 
                       value="{{ $cartitem->jumlah_product }}" min="1">
            </td>
            <td>Rp.{{ number_format($cartitem->productvarians->price_weight) }}</td>
            <td id="subtotal-{{ $cartitem->id }}">Rp{{ number_format($cartitem->sub_total) }}</td>
            <td>
                <button type="button" class="btn btn-danger btn-delete"
                    data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal"
                    data-id="{{ $cartitem->id }}">Delete</button>
            </td>
        </tr>
          <!-- Modal Konfirmasi -->
<!-- Button trigger modal -->


<!-- Modal -->
<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Apakah Anda yakin ingin menghapus item ini?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal Error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Terjadi Kesalahan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              Gagal menghapus item. Silakan coba lagi nanti.
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
      </div>
  </div>
</div>




   
           @empty
               <td colspan="8" >Kosong </td>
               @endforelse
               <tfoot>
                <tr>
                    <td colspan="6"><strong>Total Harga:</strong></td>
                    <td colspan="2" id="total-price">Rp. {{ number_format($cart->total_harga ?? 0 ) }}</td>
                </tr>
            </tfoot>
          </tbody>
         
          </table>
          
          <!-- End Default Table Example -->
        </div>
      </div>
</div>
@endsection