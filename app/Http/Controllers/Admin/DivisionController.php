<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = User::where('role', 'divisi')->latest()->paginate(10);
        return view('admin.divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('admin.divisions.create');
    }

    public function store(Request $request)
    {
        // Validasi sekarang mencakup 'username' dan membuat 'email' opsional
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'division_name' => ['required', 'string', 'max:255'],
        ]);

        // Menambahkan 'username' saat membuat user baru
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'division_name' => $request->division_name,
            'role' => 'divisi',
        ]);

        return redirect()->route('admin.divisions.index')->with('success', 'Akun divisi berhasil dibuat.');
    }

    public function edit(User $division)
    {
        return view('admin.divisions.edit', compact('division'));
    }

    public function update(Request $request, User $division)
    {
        // Validasi sekarang mencakup 'username' dan membuat 'email' opsional
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($division->id)],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($division->id)],
            'division_name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $division->update($validatedData);

        return redirect()->route('admin.divisions.index')->with('success', 'Akun divisi berhasil diperbarui.');
    }

    public function destroy(User $division)
    {
        $division->delete();
        return redirect()->route('admin.divisions.index')->with('success', 'Akun divisi berhasil dihapus.');
    }
}
