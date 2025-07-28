@extends('layouts.app')
@section('title', 'Tambah Outlet Baru')
@section('content')
<div class="card">
    <div class="card-header"><h1>Tambah Outlet Baru</h1></div>
    <form action="{{ route('admin.outlets.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @include('admin.outlets._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.outlets.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection