@extends('layouts.app')

@section('title', 'Manajemen Menu')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Manajemen Menu</h1>
        <div>
            {{-- Tombol Kembali ke Dashboard Outlet --}}
            <a href="{{ route('outlet.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            
            {{-- Tombol Tambah Menu Baru --}}
            <a href="{{ route('outlet.products.create') }}" class="btn btn-primary">Tambah Menu Baru</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('outlet.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('outlet.products.destroy', $product) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 2rem;">
                            Anda belum memiliki menu.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{-- Menampilkan link paginasi jika ada --}}
            @if ($products->hasPages())
                {{ $products->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
