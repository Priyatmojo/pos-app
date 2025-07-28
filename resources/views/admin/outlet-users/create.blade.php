@extends('layouts.app')
@section('title', 'Tambah Akun Outlet')
@section('content')
<div class="card">
    <div class="card-header"><h1>Tambah Akun Outlet Baru</h1></div>
    <form action="{{ route('admin.outlet-users.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @include('admin.outlet-users._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.outlet-users.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection