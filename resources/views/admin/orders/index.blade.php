@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Daftar Pesanan (Disetujui & Selesai)</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pemesan</th>
                        <th>Outlet</th>
                        <th>Total Tagihan</th>
                        <th>Sisa Tagihan</th>
                        <th>Status Pesanan</th>
                        <th>Status Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($approvedOrders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->outlet->name }}</td>
                        <td>Rp {{ number_format($order->total_bill, 0, ',', '.') }}</td>
                        <td><span class="text-danger">Rp {{ number_format($order->remaining_bill, 0, ',', '.') }}</span></td>
                        <td><span class="status status-{{ $order->status }}">{{ $order->status }}</span></td>
                        <td><span class="status status-{{ $order->payment_status }}">{{ $order->payment_status }}</span></td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">Detail & Bayar</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center" style="padding: 2rem;">Tidak ada pesanan yang perlu diproses pembayarannya.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $approvedOrders->links() }}
        </div>
    </div>
</div>
@endsection