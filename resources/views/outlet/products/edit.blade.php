@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Edit Menu: {{ $product->name }}</h1>
    </div>
    {{-- Menambahkan enctype untuk memungkinkan unggah file --}}
    <form action="{{ route('outlet.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stok Saat Ini</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi (Opsional)</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>
            {{-- Menambahkan input untuk file gambar dan pratinjau gambar saat ini --}}
            <div class="form-group">
                <label for="image">Gambar Menu (Opsional)</label>
                <input type="file" id="image" name="image" class="form-control">
                @if($product->image)
                    <div class="mt-2">
                        <small>Gambar Saat Ini:</small><br>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">
                    </div>
                @endif
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('outlet.products.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
