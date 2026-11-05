@extends('admin.admin_layouts.template')

@section('title', 'Dosen')
@section('page', 'Halaman Dosen')

@section('konten')
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="fas fa-check"></i> {{ session('pesan') }}
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="text-right mb-3">
            <a href="/dosen/print" target="_blank" class="btn btn-sm btn-success">Print PDF</a>   {{-- BARU --}}
            <a href="/dosen/add" class="btn btn-sm btn-primary">Add Data</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="tabelDosen" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Dosen</th>
                        <th>NIP</th>
                        <th>Nama Dosen</th>
                        <th>Mata Kuliah</th>
                        <th>Foto Dosen</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->kode_dosen }}</td>
                        <td>{{ $d->nip }}</td>
                        <td>{{ $d->nama_dosen }}</td>
                        <td>{{ $d->mata_kuliah }}</td>
                        <td>
                            <img src="{{ $d->foto_dosen ? url('foto_dosen/'.$d->foto_dosen) : asset('template/startbootstrap-sb-admin-2-gh-pages/img/undraw_profile.svg') }}" width="70" class="rounded">
                        </td>
                        <td>
                            <a href="/dosen/detail/{{ $d->id_dosen }}" class="btn btn-sm btn-success">Detail</a>
                            <a href="/dosen/edit/{{ $d->id_dosen }}" class="btn btn-sm btn-warning">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger btn-hapus"
                                    data-toggle="modal" data-target="#modalHapus"
                                    data-id="{{ $d->id_dosen }}" data-nama="{{ $d->nama_dosen }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content bg-danger text-white">
            <div class="modal-header">
                <h6 class="modal-title" id="namaHapus"></h6>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">Apakah anda ingin menghapus data ini ?</div>
            <div class="modal-footer justify-content-between">
                <a href="#" id="linkHapus" class="btn btn-outline-light">Yes</a>
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#tabelDosen').DataTable();

        $('#tabelDosen').on('click', '.btn-hapus', function () {
            $('#namaHapus').text($(this).data('nama'));
            $('#linkHapus').attr('href', "{{ url('/dosen/delete') }}/" + $(this).data('id'));
        });
    });
</script>
@endpush