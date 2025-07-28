<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutletController extends Controller
{
    /**
     * Menampilkan dashboard dengan pesanan yang perlu dikerjakan.
     */
    public function dashboard()
    {
        $outletId = Auth::user()->outlet_id;
        // Menampilkan pesanan yang baru masuk ('approved') atau sedang dibuat ('preparing')
        $activeOrders = Order::where('outlet_id', $outletId)
            ->whereIn('status', ['approved', 'preparing'])
            ->with('user', 'items.product')
            ->latest()
            ->get();
            
        return view('outlet.dashboard', compact('activeOrders'));
    }

    /**
     * Menerima pesanan dan mengubah status menjadi 'preparing'.
     */
    public function startPreparation(Order $order)
    {
        if ($order->outlet_id !== Auth::user()->outlet_id || $order->status !== 'approved') {
            abort(403);
        }
        $order->update(['status' => 'preparing']);
        return back()->with('success', 'Pesanan #' . $order->id . ' telah diterima dan sedang disiapkan.');
    }

    /**
     * Menyelesaikan pesanan dan mengubah status menjadi 'completed'.
     */
    public function completeOrder(Order $order)
    {
        // Pesanan sekarang bisa diselesaikan langsung dari status 'preparing'
        if ($order->outlet_id !== Auth::user()->outlet_id || $order->status !== 'preparing') {
            abort(403);
        }
        $order->update(['status' => 'completed']);
        return back()->with('success', 'Pesanan #' . $order->id . ' telah diselesaikan.');
    }
    
    /**
     * Menampilkan riwayat transaksi yang sudah selesai.
     * Ini adalah satu-satunya versi yang benar dari method ini.
     */
    public function transactions()
    {
        $completedOrders = Order::where('outlet_id', Auth::user()->outlet_id)
            ->where('status', 'completed')
            // Eager load detail item untuk ditampilkan di view
            ->with('user', 'items.product') 
            ->latest()
            ->paginate(15);

        return view('outlet.transactions', compact('completedOrders'));
    }
}
