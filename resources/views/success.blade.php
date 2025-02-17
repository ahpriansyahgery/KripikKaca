@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card text-center shadow-lg p-4" style="max-width: 500px;">
        <div class="card-body">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="green" class="bi bi-check-circle-fill mb-3" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 8 0a8 8 0 0 1 8 8zM12.354 5.646a.5.5 0 0 0-.708 0L7 10.293 4.854 8.146a.5.5 0 1 0-.708.708l2.5 2.5a.5.5 0 0 0 .708 0l5-5a.5.5 0 0 0 0-.708z"/>
            </svg>
            <h2 class="mb-3">Checkout Berhasil!</h2>
            <p class="text-muted">Terima kasih atas pesanan Anda. Kami akan segera memprosesnya.</p>
            <a href="{{ route('user.dashboard') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</div>

@endsection