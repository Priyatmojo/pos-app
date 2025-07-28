@extends('layouts.app')

@section('title', 'Dashboard Outlet')

@section('content')
    <div class="card">
        <div class="header-actions">
    <h1>Pesanan untuk Diproses</h1>
    <div>
        <a href="{{ route('outlet.products.index') }}" class="btn btn-secondary">Manajemen Menu</a>
        <a href="{{ route('outlet.transactions') }}" class="btn btn-secondary">Riwayat Transaksi</a>
    </div>
</div>
        <div class="card-body">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Pemesan (Divisi)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    @forelse ($activeOrders as $order)
    <tr>
        <td>#{{ $order->id }}</td>
        <td>{{ $order->user->name }}</td>
        <td><span class="status status-{{ $order->status }}">{{ $order->status == 'approved' ? 'Baru Masuk' : 'Sedang Dibuat' }}</span></td>
        <td>
            @if($order->status == 'approved')
                <form action="{{ route('outlet.orders.prepare', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-primary">Terima Pesanan</button>
                </form>
            @elseif($order->status == 'preparing')
                <form action="{{ route('outlet.completeOrder', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-success">Selesaikan</button>
                </form>
            @endif
        </td>
    </tr>
    @empty
    <tr><td colspan="4" class="text-center" style="padding: 2rem;">Tidak ada pesanan aktif.</td></tr>
    @endforelse
</tbody>
                </table>
            </div>
        </div>
    </div>
@endsection