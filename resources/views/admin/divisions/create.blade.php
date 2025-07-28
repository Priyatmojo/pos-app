@extends('layouts.app')
@section('title', 'Tambah Akun Divisi')
@section('content')
<div class="card">
    <div class="card-header"><h1>Tambah Akun Divisi Baru</h1></div>
    <form action="{{ route('admin.divisions.store') }}" method="POST">
        @csrf
        <div class="card-body">
            {{-- Memanggil form parsial yang sudah tidak memiliki dropdown outlet --}}
            @include('admin.divisions._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.divisions.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
