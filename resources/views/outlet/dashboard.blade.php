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
                        @forelse ($approvedOrders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                 <form action="{{ route('outlet.completeOrder', $order) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary">Selesaikan</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 2rem;">
                                Tidak ada pesanan yang perlu diproses.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection