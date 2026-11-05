@extends('layouts.template')

@section('konten')
<div class="card m-4">
  <div class="card-body">

    <!-- Tombol Aksi Kiri & Form Cari Kanan -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <a href="/produk/tambah" class="btn btn-info text-white btn-sm">+ Tambah Data</a>
        <a href="#" class="btn btn-info text-white btn-sm">Print Data Barang</a>
        <a href="#" class="btn btn-info text-white btn-sm">Keluar Aplikasi</a>
      </div>

      <form class="d-flex align-items-center">
        <label class="me-2 mb-0" style="white-space: nowrap;">Cari berdasarkan :</label>
        <select class="form-select form-select-sm me-2">
          <option>Kode Barang</option>
          <option>Nama Barang</option>
        </select>
        <input type="text" class="form-control form-control-sm me-2" placeholder="Cari Data">
        <button type="submit" class="btn btn-info text-white btn-sm">Cari</button>
      </form>
    </div>

    <!-- Judul -->
    <h4 class="card-title text-center mb-4">DATA BARANG</h4>
    
    <!-- Tabel Data Barang -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Barang</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Stok</th>
          <th scope="col">Harga Beli</th>
          <th scope="col">Harga Jual</th>
          <th scope="col">Gambar Produk</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>BRG01</td>
          <td>Samsung M10s</td>
          <td>7</td>
          <td>Rp 2.520.000,00</td>
          <td>Rp 2.700.000,00</td>
          <td><img src="{{ asset('images/samsung.webp') }}" width="60" alt="Samsung"></td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-info btn-sm">Hapus</a>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>BRG02</td>
          <td>Iphone 17 Pro Max</td>
          <td>5</td>
          <td>Rp 30.000.000,00</td>
          <td>Rp 40.500.000,00</td>
          <td><img src="{{ asset('images/iphone17.webp') }}" width="60" alt="Iphone"></td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-info btn-sm">Hapus</a>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>BRG03</td>
          <td>Redmi Note 8</td>
          <td>20</td>
          <td>Rp 2.200.000,00</td>
          <td>Rp 2.500.000,00</td>
          <td><img src="{{ asset('images/redmi.png') }}" width="60" alt="Redmi"></td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-info btn-sm">Hapus</a>
          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>BRG04</td>
          <td>Xiaomi Redmi Note 9 Pro</td>
          <td>11</td>
          <td>Rp 3.200.000,00</td>
          <td>Rp 3.350.000,00</td>
          <td><img src="{{ asset('images/xiaomi.webp') }}" width="60" alt="Xiaomi"></td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-info btn-sm">Hapus</a>
          </td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>BRG05</td>
          <td>Xiaomi Redmi Note 8</td>
          <td>10</td>
          <td>Rp 2.400.000,00</td>
          <td>Rp 2.850.000,00</td>
          <td><img src="{{ asset('images/xiaomi.png') }}" width="60" alt="Redmi 8"></td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-info btn-sm">Hapus</a>
          </td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>BRG06</td>
          <td>Vivo X70 Pro</td>
          <td>5</td>
          <td>Rp 18.000.000,00</td>
          <td>Rp 18.500.000,00</td>
          <td><img src="{{ asset('images/vivo.webp') }}" width="60" alt="Vivo"></td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-info btn-sm">Hapus</a>
          </td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td>BRG07</td>
          <td>Asus Zenfone 7 Pro</td>
          <td>6</td>
          <td>Rp 3.100.000,00</td>
          <td>Rp 3.350.000,00</td>
          <td><img src="{{ asset('images/asus.jpeg') }}" width="60" alt="Asus"></td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Edit</a>
            <a href="#" class="btn btn-info btn-sm">Hapus</a>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
</div>
@endsection