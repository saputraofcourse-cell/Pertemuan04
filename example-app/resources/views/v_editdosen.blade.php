@extends('admin.admin_layouts.template')

@section('title', 'Edit Dosen')
@section('page', 'Edit Data Dosen')

@section('konten')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">Form Edit</div>

            <form action="/dosen/update/{{ $dosen->id_dosen }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    {{-- >>> BARU --}}
                    <div class="form-group">
                        <label>ID Dosen</label>
                        <input type="text" value="{{ $dosen->kode_dosen }}" class="form-control" readonly>
                    </div>
                    {{-- <<< BARU --}}

                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" value="{{ $dosen->nip }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input type="text" name="nama_dosen" value="{{ old('nama_dosen', $dosen->nama_dosen) }}"
                               class="form-control @error('nama_dosen') is-invalid @enderror">
                        @error('nama_dosen')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" value="{{ old('mata_kuliah', $dosen->mata_kuliah) }}"
                               class="form-control @error('mata_kuliah') is-invalid @enderror">
                        @error('mata_kuliah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Foto Dosen <small class="text-muted">(kosongkan jika tidak diganti)</small></label>
                        <input type="file" name="foto_dosen" class="form-control-file @error('foto_dosen') is-invalid @enderror">
                        @error('foto_dosen')<div class="text-danger small">{{ $message }}</div>@enderror
                        <br>
                        <img src="{{ $dosen->foto_dosen ? url('foto_dosen/'.$dosen->foto_dosen) : asset('template/startbootstrap-sb-admin-2-gh-pages/img/undraw_profile.svg') }}" width="100" class="rounded">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/dosen" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection