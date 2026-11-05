@extends('layouts.template')
@section ('konten')
    <h1> Ini adalah Halaman Tambah Produk</h1>
    <div class = "alert alert-primary">
        <b> Nama Gudang : </b> {{  $nama_gudang }}
        <br>
        <b> Lokasi : </b> {{  $lokasi }}
        <br>
        <b> Tipe Gudang : </b> {{  $type }}
    </div>
@endsection