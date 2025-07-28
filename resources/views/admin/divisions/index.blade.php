@extends('layouts.app')
@section('title', 'Manajemen Divisi')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Manajemen Divisi</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.divisions.create') }}" class="btn btn-primary">Tambah Akun Divisi</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Username (untuk login)</th>
                        <th>Nama Divisi</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($divisions as $division)
                    <tr>
                        <td>{{ $division->name }}</td>
                        <td>{{ $division->username }}</td>
                        <td>{{ $division->division_name }}</td>
                        <td>
                            <a href="{{ route('admin.divisions.edit', $division) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.divisions.destroy', $division) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" style="text-align: center; padding: 2rem;">Tidak ada data akun divisi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $divisions->links() }}</div>
    </div>
</div>
@endsection
