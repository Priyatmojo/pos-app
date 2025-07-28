@extends('layouts.app')
@section('title', 'Edit Outlet')
@section('content')
<div class="card">
    <div class="card-header"><h1>Edit Outlet</h1></div>
    <form action="{{ route('admin.outlets.update', $outlet) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="card-body">
            @include('admin.outlets._form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.outlets.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection