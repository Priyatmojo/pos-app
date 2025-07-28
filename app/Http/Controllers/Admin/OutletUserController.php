<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class OutletUserController extends Controller
{
    public function index()
    {
        $outletUsers = User::where('role', 'outlet')->with('outlet')->latest()->paginate(10);
        return view('admin.outlet-users.index', compact('outletUsers'));
    }

    public function create()
    {
        $outlets = Outlet::orderBy('name')->get();
        return view('admin.outlet-users.create', compact('outlets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'outlet_id' => ['required', 'exists:outlets,id'],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'outlet_id' => $request->outlet_id,
            'role' => 'outlet',
        ]);

        return redirect()->route('admin.outlet-users.index')->with('success', 'Akun outlet berhasil dibuat.');
    }

    public function edit(User $outletUser)
    {
        $outlets = Outlet::orderBy('name')->get();
        return view('admin.outlet-users.edit', compact('outletUser', 'outlets'));
    }

    public function update(Request $request, User $outletUser)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($outletUser->id)],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($outletUser->id)],
            'outlet_id' => ['required', 'exists:outlets,id'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        if (empty($validatedData['password'])) {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $outletUser->update($validatedData);

        return redirect()->route('admin.outlet-users.index')->with('success', 'Akun outlet berhasil diperbarui.');
    }

    public function destroy(User $outletUser)
    {
        $outletUser->delete();
        return redirect()->route('admin.outlet-users.index')->with('success', 'Akun outlet berhasil dihapus.');
    }
}