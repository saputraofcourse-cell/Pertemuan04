@extends('admin.admin_layouts.template')

@section('title', 'Tambah Dosen')
@section('page', 'Tambah Data Dosen')

@section('konten')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">Form Add</div>

            <form action="/dosen/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    {{-- >>> BARU --}}
                    <div class="form-group">
                        <label>ID Dosen</label>
                        <input type="text" value="{{ $kode }}" class="form-control" readonly>
                    </div>
                    {{-- <<< BARU --}}

                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" value="{{ old('nip') }}" placeholder="Masukan NIP"
                               class="form-control @error('nip') is-invalid @enderror">
                        @error('nip')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input type="text" name="nama_dosen" value="{{ old('nama_dosen') }}" placeholder="Masukan Nama Dosen"
                               class="form-control @error('nama_dosen') is-invalid @enderror">
                        @error('nama_dosen')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" value="{{ old('mata_kuliah') }}" placeholder="Masukan Mata Kuliah"
                               class="form-control @error('mata_kuliah') is-invalid @enderror">
                        @error('mata_kuliah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Foto Dosen</label>
                        <input type="file" name="foto_dosen" class="form-control-file @error('foto_dosen') is-invalid @enderror">
                        @error('foto_dosen')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Insert</button>
                    <a href="/dosen" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection