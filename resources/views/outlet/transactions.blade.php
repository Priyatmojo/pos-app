@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Riwayat Transaksi Selesai</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Pemesan</th>
                        <th>Total Tagihan</th>
                        <th>Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($completedOrders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>Rp {{ number_format($order->total_bill, 0, ',', '.') }}</td>
                        <td>{{ $order->updated_at->format('d M Y, H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 2rem;">
                            Belum ada transaksi yang selesai.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $completedOrders->links() }}
        </div>
    </div>
</div>
@endsection
