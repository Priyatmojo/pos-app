<?php

namespace App\Http\Controllers\Outlet;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('outlet_id', Auth::user()->outlet_id)
            ->latest()
            ->paginate(10);

        return view('outlet.products.index', compact('products'));
    }

    public function create()
    {
        return view('outlet.products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        if ($request->hasFile('image')) {
            // Simpan gambar dan dapatkan path-nya
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        $validatedData['outlet_id'] = Auth::user()->outlet_id;
        Product::create($validatedData);

        return redirect()->route('outlet.products.index')
            ->with('success', 'Menu baru berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        if ($product->outlet_id !== Auth::user()->outlet_id) {
            abort(403, 'AKSI TIDAK DIIZINKAN');
        }

        return view('outlet.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->outlet_id !== Auth::user()->outlet_id) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // Unggah gambar baru
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        $product->update($validatedData);

        return redirect()->route('outlet.products.index')
            ->with('success', 'Data menu berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->outlet_id !== Auth::user()->outlet_id) {
            abort(403);
        }

        // Hapus gambar terkait saat produk dihapus
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('outlet.products.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
