@extends('layouts.app')
@section('title', 'Edit Akun Outlet')
@section('content')
<div class="card">
    <div class="card-header"><h1>Edit Akun Outlet</h1></div>
    <form action="{{ route('admin.outlet-users.update', $outletUser) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="card-body">
            @include('admin.outlet-users._form', ['isEdit' => true])
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.outlet-users.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
