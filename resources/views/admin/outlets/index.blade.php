@extends('layouts.app')

@section('title', 'Manajemen Outlet')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Manajemen Outlet</h1>
        <div>
            {{-- Tombol Kembali ke Dashboard Admin --}}
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            
            {{-- Tombol Tambah Outlet Baru --}}
            <a href="{{ route('admin.outlets.create') }}" class="btn btn-primary">Tambah Outlet Baru</a>
        </div>
    </div>
    <div class="card-body">
        @include('admin.outlets._table')
    </div>
</div>
@endsection
