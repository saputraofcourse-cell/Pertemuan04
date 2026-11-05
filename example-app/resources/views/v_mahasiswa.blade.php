@extends('admin.admin_layouts.template')

@section('title', 'Mahasiswa')
@section('page', 'Halaman Mahasiswa')

@section('konten')
<div class="card shadow mb-4">
    <div class="card-body">Halo {{ auth()->user()->name }}, ini halaman khusus <b>Mahasiswa</b>.</div>
</div>
@endsection