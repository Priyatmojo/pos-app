@extends('layouts.app')

@section('title', 'Rekap Transaksi')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Rekap Transaksi Selesai</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
    <div class="card-body">
        @forelse ($completedOrders as $order)
            <div class="recap-item">
                <div class="recap-header" data-toggle="recap-{{ $order->id }}">
                    <div class="recap-info">
                        <strong>Pesanan #{{ $order->id }}</strong>
                        <span class="recap-meta">Oleh: {{ $order->user->name }}</span>
                        <span class="recap-meta">Outlet: {{ $order->outlet->name }}</span>
                    </div>
                    <div class="recap-summary">
                        <span>Total: <strong>Rp {{ number_format($order->total_bill, 0, ',', '.') }}</strong></span>
                        <span class="recap-date">{{ $order->updated_at->format('d M Y, H:i') }}</span>
                        <span class="recap-arrow">▼</span>
                    </div>
                </div>
                <div class="recap-details" id="recap-{{ $order->id }}">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Kuantitas</th>
                                    <th>Harga Satuan</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp {{ number_format($item->price_per_item, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($item->price_per_item * $item->quantity, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center" style="padding: 2rem;">Belum ada transaksi yang selesai.</p>
        @endforelse
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const recapHeaders = document.querySelectorAll('.recap-header');
    recapHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const targetId = this.getAttribute('data-toggle');
            const detailElement = document.getElementById(targetId);
            const arrow = this.querySelector('.recap-arrow');

            if (detailElement.style.display === 'block') {
                detailElement.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
            } else {
                detailElement.style.display = 'block';
                arrow.style.transform = 'rotate(180deg)';
            }
        });
    });
});
</script>
@endpush
