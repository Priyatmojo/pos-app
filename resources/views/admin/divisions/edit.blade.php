@extends('layouts.app')
@section('title', 'Edit Akun Divisi')
@section('content')
<div class="card">
    <div class="card-header"><h1>Edit Akun Divisi</h1></div>
    <form action="{{ route('admin.divisions.update', $division) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="card-body">
            {{-- Memanggil form yang sudah bersih, dan mengirimkan variabel isEdit --}}
            @include('admin.divisions._form', ['isEdit' => true])
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.divisions.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
