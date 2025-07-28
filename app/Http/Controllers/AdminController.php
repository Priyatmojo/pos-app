<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard HANYA dengan pesanan yang masih 'pending'.
     */
    public function dashboard()
    {
        $pendingOrders = Order::where('status', 'pending')->with('user', 'outlet')->latest()->get();
        return view('admin.dashboard', compact('pendingOrders'));
    }

    /**
     * Menampilkan daftar pesanan yang SUDAH DISETUJUI dan siap untuk pembayaran.
     */
    public function approvedOrders()
    {
        $approvedOrders = Order::whereIn('status', ['approved', 'completed'])
            ->with('user', 'outlet')
            ->latest()
            ->paginate(15);
        return view('admin.orders.index', compact('approvedOrders'));
    }

    /**
     * Menyetujui pesanan dan mengubah statusnya menjadi 'approved'.
     * Ini adalah method yang hilang.
     */
    public function approveOrder(Order $order)
    {
        $order->update(['status' => 'approved']);
        return back()->with('success', 'Pesanan berhasil disetujui dan diteruskan ke outlet.');
    }

    /**
     * Menampilkan halaman detail pesanan untuk pembayaran.
     */
    public function show(Order $order)
    {
        $order->load('user', 'outlet', 'items.product', 'payments');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Menyimpan data pembayaran baru untuk sebuah pesanan.
     */
    public function storePayment(Request $request, Order $order)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01|max:' . $order->remaining_bill,
            'payment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();

            $order->payments()->create($validated);
            $order->increment('paid_amount', $validated['amount']);

            if ($order->paid_amount >= $order->total_bill) {
                $order->payment_status = 'paid';
            } else {
                $order->payment_status = 'partial';
            }
            $order->save();

            DB::commit();

            return back()->with('success', 'Pembayaran berhasil dicatat.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal menyimpan pembayaran: ' . $e->getMessage()]);
        }
    }

    /**
     * Menampilkan halaman rekapitulasi untuk semua transaksi yang sudah 'completed'.
     */
    public function transactionRecap()
    {
        $completedOrders = Order::where('status', 'completed')
            ->with('items.product', 'user', 'outlet')
            ->latest()
            ->get();

        return view('admin.recap', compact('completedOrders'));
    }
}
