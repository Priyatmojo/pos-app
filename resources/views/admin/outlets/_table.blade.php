<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Nama Outlet</th>
                <th>Alamat</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($outlets as $outlet)
            <tr>
                <td>{{ $outlet->name }}</td>
                <td>{{ $outlet->address }}</td>
                <td>
                    <a href="{{ route('admin.outlets.edit', $outlet) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.outlets.destroy', $outlet) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus outlet ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="3" class="text-center">Tidak ada data outlet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $outlets->links() }}</div>