@extends('layouts.app')
@section('title', 'Manajemen Akun Outlet')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Manajemen Akun Outlet</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.outlet-users.create') }}" class="btn btn-primary">Tambah Akun Outlet</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Bertugas di Outlet</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($outletUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->outlet->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.outlet-users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.outlet-users.destroy', $user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center" style="padding: 2rem;">Tidak ada data akun outlet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $outletUsers->links() }}</div>
    </div>
</div>
@endsection
