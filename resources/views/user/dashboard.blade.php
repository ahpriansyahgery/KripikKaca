@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Kolom Kiri: Informasi User -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm p-3">
                <h4>Halo, {{ $user->name }}</h4>
                <p>Email: {{ $user->email }}</p>
                <p>No. HP: {{ $orders->checkout->no_hp ?? '-' }}</p>
                <p>Alamat: {{ $orders->checkout->address ?? '-' }}</p>
                <p>Status: {{ $orders->is_paid ?? '-' }}</p>
            </div>
        </div>

        <!-- Kolom Kanan: Daftar Item Order -->
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm p-3">
                <h5>Riwayat Pesanan</h5>

                @if($orders)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orderitems as $orderitem)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($orderitem->product)->name ?? '-' }}</td>
                                    <td>Rp. {{ number_format($orderitem->sub_total) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada item di order ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Anda belum memiliki pesanan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
