@extends('admin.admin_layouts.template')

@section('title', 'Detail Dosen')
@section('page', 'Halaman Detail Dosen')

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">Detail Dosen</div>
    <div class="card-body">
        <p><b>NIP :</b> {{ $dosen->nip }}</p>
        <p><b>Nama Dosen :</b> {{ $dosen->nama_dosen }}</p>
        <p><b>Mata Kuliah :</b> {{ $dosen->mata_kuliah }}</p>
        <p>
            <b>Foto :</b><br>
            <img src="{{ $dosen->foto_dosen ? url('foto_dosen/'.$dosen->foto_dosen) : asset('template/startbootstrap-sb-admin-2-gh-pages/img/undraw_profile.svg') }}" width="200" class="rounded">
        </p>
    </div>
    <div class="card-footer">
        <a href="/dosen" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection