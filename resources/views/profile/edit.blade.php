@extends('layouts.app')

@section('title', 'Manajemen Profil')

@section('content')

{{-- Tombol Kembali yang Dinamis --}}
<div class="mb-4">
    @if(Auth::user()->role == 'admin')
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard Admin</a>
    @elseif(Auth::user()->role == 'outlet')
        <a href="{{ route('outlet.dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard Outlet</a>
    @elseif(Auth::user()->role == 'divisi')
        <a href="{{ route('divisi.dashboard') }}" class="btn btn-secondary">← Kembali ke Dashboard Divisi</a>
    @endif
</div>


<div class="profile-grid">
    {{-- Kartu untuk Informasi Profil --}}
    <div class="card">
        <div class="card-header">
            <h2>Informasi Profil</h2>
        </div>
        {{-- Tampilkan pesan sukses khusus untuk profil --}}
        @if (session('success'))
            <div class="alert alert-success m-4">{{ session('success') }}</div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="username">Username (untuk login)</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                </div>
                 <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" disabled readonly>
                    <small class="text-muted">Email tidak dapat diubah.</small>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan Profil</button>
            </div>
        </form>
    </div>

    {{-- Kartu untuk Ubah Password --}}
    <div class="card">
        <div class="card-header">
            <h2>Ubah Password</h2>
        </div>
         {{-- Tampilkan pesan sukses khusus untuk password --}}
        @if (session('success_password'))
            <div class="alert alert-success m-4">{{ session('success_password') }}</div>
        @endif
        <form action="{{ route('profile.password.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="current_password">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
