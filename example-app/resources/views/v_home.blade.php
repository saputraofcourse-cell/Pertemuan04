@extends('admin.admin_layouts.template')

@section('title', 'Home')
@section('page', 'Halaman Home')

@section('konten')
<div class="card shadow mb-4">
    <div class="card-body">
        <h4>Selamat datang, {{ auth()->user()->name }}!</h4>
        <p class="mb-0">Anda login sebagai <b>{{ auth()->user()->level_nama }}</b>.</p>
    </div>
</div>
@endsection