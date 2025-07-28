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
                            <th>Tanggal Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                          @forelse ($activeOrders as $order)
    <tr>
        <td>#{{ $order->id }}</td>
        <td>{{ $order->user->name }}</td>
        <td><span class="status status-{{ $order->status }}">{{ $order->status }}</span></td>
        <td>
            {{-- Tombol Aksi Dinamis Berdasarkan Status --}}
            @if($order->status == 'approved')
                <form action="{{ route('outlet.orders.prepare', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-primary">Mulai Siapkan</button>
                </form>
            @elseif($order->status == 'preparing')
                <form action="{{ route('outlet.orders.ready', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-warning">Siap Diambil</button>
                </form>
            @elseif($order->status == 'ready')
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