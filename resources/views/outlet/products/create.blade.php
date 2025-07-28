@extends('layouts.app')

@section('title', 'Tambah Menu Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Tambah Menu Baru</h1>
    </div>
    {{-- Menambahkan enctype untuk memungkinkan unggah file --}}
    <form action="{{ route('outlet.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stok Awal</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi (Opsional)</label>
                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            {{-- Menambahkan input untuk file gambar --}}
            <div class="form-group">
                <label for="image">Gambar Menu (Opsional)</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('outlet.products.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
