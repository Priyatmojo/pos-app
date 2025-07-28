@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <h2>Login ke Akun Anda</h2>
    
    {{-- Pastikan form ini memiliki method POST dan action ke route 'login' --}}
    <form method="POST" action="{{ route('login') }}">
        
        {{-- Ini adalah bagian terpenting untuk mencegah error 419 --}}
        @csrf

        <div class="form-group">
            {{-- Ubah label dari Email menjadi Username --}}
            <label for="username">Username</label>
            {{-- Ubah input type, id, dan name --}}
            <input id="username" type="text" name="username" class="form-control" value="{{ old('username') }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>

{{-- Tambahkan gaya untuk form login jika belum ada di style.css --}}
<style>
.login-container {
    max-width: 450px;
    margin: 3rem auto;
    padding: 2rem;
    background: var(--white-color);
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
}
.login-container h2 {
    text-align: center;
    margin-bottom: 1.5rem;
}
</style>
@endsection
