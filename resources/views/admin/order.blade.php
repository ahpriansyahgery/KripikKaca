@extends('layouts.admin')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">No Hp</th>
          <th scope="col">Alamat </th>
          <th scope="col">Product</th>
          <th scope="col">Ukuran (Kg)</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($orders as $order)
            
        @php $rowspan = count($order->orderitems); @endphp
            
        @foreach ($order->orderitems as $index => $orderitem)
            

        <tr>
          @if ($index == 0) 
          <!-- Tampilkan nama user hanya pada baris pertama dengan rowspan -->
          <th scope="row" rowspan="{{ $rowspan }}">{{ $no++ }}</th>
              <td rowspan="{{ $rowspan }}">{{ $order->user['name'] }}</td>
              <td rowspan="{{ $rowspan }}">{{ $order->user->email }}</td>
              <td rowspan="{{ $rowspan }}">{{ $order->checkout->no_hp }}</td>
              <td rowspan="{{ $rowspan }}">{{ $order->checkout->address }}</td>
          @endif
  
          <td>{{ $orderitem->product->name }}</td>
          <td>{{ optional($orderitem->productvarians)->weight ?? 'Tidak ada varian' }} Kg</td>
          <td>{{ $orderitem->sub_total }}</td>
          <td>
              <button class="btn btn-primary">Order Diterima</button>
          </td>
        </tr>
     
        @endforeach
        @empty
            <td>Orderan Kosong</td>
        @endforelse
      </tbody>
  </table>
@endsection