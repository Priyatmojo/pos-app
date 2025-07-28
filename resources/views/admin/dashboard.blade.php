@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Dashboard Admin</h1>
        <div>
            {{-- Link ke halaman baru untuk pembayaran --}}
            <a href="{{ route('admin.orders.approved') }}" class="btn btn-primary">Lihat Pesanan & Pembayaran</a>
            <a href="{{ route('admin.recap') }}" class="btn btn-secondary">Rekap Transaksi</a>
            <a href="{{ route('admin.outlets.index') }}" class="btn btn-secondary">Manajemen Outlet</a>
            <a href="{{ route('admin.outlet-users.index') }}" class="btn btn-secondary">Akun Outlet</a>
            <a href="{{ route('admin.divisions.index') }}" class="btn btn-secondary">Manajemen Divisi</a>
        </div>
    </div>
    <div class="card-body">
        <h2>Pesanan Masuk (Menunggu Persetujuan)</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Pemesan (Divisi)</th>
                        <th>Outlet Tujuan</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pendingOrders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->outlet->name }}</td>
                        <td>Rp {{ number_format($order->total_bill, 0, ',', '.') }}</td>
                        <td>
                            {{-- HANYA tombol Setujui yang ada di sini --}}
                            <form action="{{ route('admin.approveOrder', $order) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Setujui</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center" style="padding: 2rem;">Tidak ada pesanan yang menunggu persetujuan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection