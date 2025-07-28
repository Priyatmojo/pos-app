<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutletController extends Controller
{
    /**
     * Menampilkan dashboard dengan pesanan yang perlu diproses.
     */
    public function dashboard()
    {
        $outletId = Auth::user()->outlet_id;

        $activeOrders = Order::where('outlet_id', $outletId)
            ->whereIn('status', ['approved', 'preparing', 'ready'])
            ->with('user', 'items.product')
            ->latest()
            ->get();
            
        return view('outlet.dashboard', compact('activeOrders'));
    }

    /**
     * Outlet mulai menyiapkan pesanan.
     */
    public function startPreparation(Order $order)
    {
        if ($order->outlet_id !== Auth::user()->outlet_id || $order->status !== 'approved') {
            abort(403);
        }
        $order->update(['status' => 'preparing']);
        return back()->with('success', 'Pesanan #' . $order->id . ' sekarang sedang disiapkan.');
    }

    /**
     * Outlet menandai pesanan siap diambil.
     */
    public function markAsReady(Order $order)
    {
        if ($order->outlet_id !== Auth::user()->outlet_id || $order->status !== 'preparing') {
            abort(403);
        }
        $order->update(['status' => 'ready']);
        return back()->with('success', 'Pesanan #' . $order->id . ' telah siap untuk diambil.');
    }

    /**
     * Menyelesaikan pesanan (setelah diambil oleh Divisi).
     * Ini adalah satu-satunya versi yang benar dari method ini.
     */
    public function completeOrder(Order $order)
    {
        if ($order->outlet_id !== Auth::user()->outlet_id || $order->status !== 'ready') {
            abort(403);
        }
        $order->update(['status' => 'completed']);
        return back()->with('success', 'Pesanan #' . $order->id . ' telah diselesaikan.');
    }

    /**
     * Menampilkan halaman manajemen produk (menu) untuk outlet ini.
     */
    public function products()
    {
        $products = Product::where('outlet_id', Auth::user()->outlet_id)->latest()->get();
        return view('outlet.products.index', compact('products'));
    }
    
    /**
     * Menampilkan riwayat transaksi yang sudah selesai.
     */
    public function transactions()
    {
        $completedOrders = Order::where('outlet_id', Auth::user()->outlet_id)
            ->where('status', 'completed')
            ->with('user')
            ->latest()
            ->paginate(15);

        return view('outlet.transactions', compact('completedOrders'));
    }
}