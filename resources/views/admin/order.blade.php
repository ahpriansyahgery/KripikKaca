@extends('layouts.admin')

@section('content')
  <table class="table table-striped">
    <a href="{{ route('admin.order.export') }}"><button class="btn btn-success btn-sm" >Export excel</button></a>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">No Hp</th>
        <th scope="col">Alamat </th>
        <th scope="col">Product</th>
        <th scope="col">Total Harga</th>
        <th scope="col">status</th>
        
      </tr>
    </thead>
    <tbody>
      @forelse ($orders as $order)
          
    
      <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->user->email }}</td>
        <td>{{ $order->checkout->no_hp }}</td>
        <td>{{ $order->checkout->address }}</td>
        <td>
          <ul class="d-flex flex-column ">
            @foreach ( $order->orderitems as $orderitem)
          <li>{{ $orderitem->product->name }} - ({{ $orderitem->productvarians->weight }}Kg) </li>  
      
          @endforeach
        </ul>

      </td>
       <td>Rp{{ number_format($order->total_harga) }}</td>
       <td>
        @if (!$order->is_paid)
            <form action="{{ route('admin.order.status',$order->id) }}" method="POST" >
              @csrf
              <button class="btn btn-primary btn-sm" type="submit" >Order Terima</button>
            </form>
            @else
          <span class="badge bg-success" >Order di Terima</span>
        @endif
       </td>
       
      
      </tr>
      @empty
          <td>Belum Ada Orderan</td>
      @endforelse
    </tbody>
  </table>
@endsection