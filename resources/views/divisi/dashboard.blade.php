@extends('layouts.app')

@section('title', 'Dashboard Divisi')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Riwayat Pesanan Saya</h1>
            <a href="{{ route('divisi.createOrder') }}" class="btn btn-primary">Buat Pesanan Baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Outlet</th>
                            <th>Total Tagihan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($myOrders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->outlet->name }}</td>
                            <td>Rp {{ number_format($order->total_bill, 0, ',', '.') }}</td>
                            <td><span class="status status-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 2rem;">
                                Anda belum pernah membuat pesanan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection