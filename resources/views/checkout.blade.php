@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="mb-4">Checkout</h2>

  @if(session('message'))
      <div class="alert alert-success">{{ session('message') }}</div>
  @endif

  @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  @if($cartitems->isEmpty())
      <div class="alert alert-warning">Keranjang Anda kosong.</div>
  @else

  <div class="row">
    <!-- Form Checkout (Kiri) -->
    <div class="col-md-6">
        <div class="card shadow p-4">
            <h4>Informasi Pengiriman</h4>
            <form action="{{ route('process.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name"  readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ auth()->user()->email }}"   name="email" readonly>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor HP</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Pengiriman</label>
                    <textarea id="address" name="address" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Proses Checkout</button>
            </form>
        </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow p-4 ">
        <h4>Keranjang Belanja</h4>

        <table class="table table-sm">
          <thead>
              <tr>
                <th >#</th>
                <th >Categorie</th>
                <th>Product</th>
                <th>Size</th>
                <th>Jumlah</th>
                <th>Price</th>
                <th>SubTotal</th>
               
              </tr>
          </thead>
          <tbody>
              @forelse($cartitems as $cartitem)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cartitem->product->categorie->name }}</td>
                    <td>{{ $cartitem->product->name }}</td>
                    <td>{{ $cartitem->productvarians->weight }}Kg</td>
                    <td>
                      {{ $cartitem->jumlah_product }}
                  </td>
                  <td>Rp.{{ number_format($cartitem->productvarians->price_weight) }}</td>
                  <td id="subtotal-{{ $cartitem->id }}">Rp{{ number_format($cartitem->sub_total) }}</td>
                  </tr>
                  @empty
               <td colspan="8" >Kosong </td>
              @endforelse
              <tr>
                <td colspan="6"><strong>Total Harga:</strong></td>
                <td colspan="2" id="total-price">Rp. {{ number_format($cart->total_harga) }}</td>
            </tr>
          </tbody>
      </table>
      </div>
    </div>

     

     

      <!-- Form Checkout -->
   
  @endif
</div>
@endsection