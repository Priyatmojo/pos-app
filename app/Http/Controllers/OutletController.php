<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class OutletController extends Controller
{
    /**
     * Menampilkan dashboard outlet dengan daftar pesanan yang perlu diproses.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Mengambil ID outlet dari user yang sedang login
        $outletId = Auth::user()->outlet_id;

        // Mengambil pesanan yang sudah disetujui ('approved') untuk outlet ini
        $approvedOrders = Order::where('outlet_id', $outletId)
            ->where('status', 'approved')
            ->with('user', 'items.product') // Eager load relasi untuk efisiensi
            ->latest() // Urutkan dari yang terbaru
            ->get();
            
        return view('outlet.dashboard', compact('approvedOrders'));
    }

    /**
     * Menampilkan halaman manajemen produk (menu) untuk outlet ini.
     *
     * @return \Illuminate\View\View
     */
    public function products()
    {
        // Mengambil semua produk yang dimiliki oleh outlet yang sedang login
        $products = Product::where('outlet_id', Auth::user()->outlet_id)->latest()->get();
        return view('outlet.products.index', compact('products'));
    }

    /**
     * Menyelesaikan pesanan dan mengubah statusnya menjadi 'completed'.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function completeOrder(Order $order)
    {
        // Middleware atau Gate/Policy lebih disarankan untuk otorisasi,
        // namun pengecekan manual ini juga berfungsi sebagai lapisan keamanan.
        if ($order->outlet_id !== Auth::user()->outlet_id) {
            abort(403, 'AKSI TIDAK DIIZINKAN.');
        }

        // Update status pesanan menjadi 'completed'
        $order->update(['status' => 'completed']);

        return back()->with('success', 'Pesanan telah diselesaikan.');
    }
    
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
