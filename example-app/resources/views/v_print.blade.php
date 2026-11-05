<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Dosen</title>
    <style>
        body  { font-family: sans-serif; font-size: 11pt; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th    { background: #e5e5e5; }
    </style>
</head>
<body>
    <h3>Laporan Data Dosen &nbsp;<small>Date: {{ date('d M Y') }}</small></h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Dosen</th>
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Mata Kuliah</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>