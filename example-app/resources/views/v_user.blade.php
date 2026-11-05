@extends('admin.admin_layouts.template')

@section('title', 'User')
@section('page', 'Halaman User')

@section('konten')
<div class="card shadow mb-4">
    <div class="card-body">Halo {{ auth()->user()->name }}, ini halaman khusus <b>User</b>.</div>
</div>
@endsection