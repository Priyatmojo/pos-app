<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::latest()->paginate(10);
        return view('admin.outlets.index', compact('outlets'));
    }

    public function create()
    {
        return view('admin.outlets.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:outlets',
            'address' => 'required|string',
        ]);

        // Gunakan $validatedData yang sudah bersih dan aman
        Outlet::create($validatedData);

        return redirect()->route('admin.outlets.index')
            ->with('success', 'Outlet baru berhasil ditambahkan.');
    }

    public function edit(Outlet $outlet)
    {
        return view('admin.outlets.edit', compact('outlet'));
    }

    public function update(Request $request, Outlet $outlet)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:outlets,name,' . $outlet->id,
            'address' => 'required|string',
        ]);

        // Gunakan $validatedData yang sudah bersih dan aman, bukan $request->all()
        $outlet->update($validatedData);

        return redirect()->route('admin.outlets.index')
            ->with('success', 'Data outlet berhasil diperbarui.');
    }

    public function destroy(Outlet $outlet)
    {
        $outlet->delete();

        return redirect()->route('admin.outlets.index')
            ->with('success', 'Outlet berhasil dihapus.');
    }
}
