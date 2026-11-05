@extends('admin.admin_layouts.template')

@section('title', 'Invoice')
@section('page', 'Halaman Invoice')

@push('styles')
<style>
    @media print {
        .sidebar, .topbar, .sticky-footer, .scroll-to-top, .no-print { display: none !important; }
        #content-wrapper { margin: 0 !important; }
    }
</style>
@endpush

@section('konten')
@php $total = collect($item)->sum(fn ($i) => $i['qty'] * $i['harga']); @endphp

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-4">
            <div>
                <h5>SIAKAD, Inc.</h5>
                <small>Politeknik Negeri Subang<br>Jln. Brigjen Katamso Dangdeur, Subang</small>
            </div>
            <div class="text-right">
                <b>Invoice #007612</b><br>
                <small>Tanggal: {{ date('d/m/Y') }}</small>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Qty</th>
                    <th>Produk</th>
                    <th>Serial #</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item as $i)
                <tr>
                    <td>{{ $i['qty'] }}</td>
                    <td>{{ $i['produk'] }}</td>
                    <td>{{ $i['serial'] }}</td>
                    <td class="text-right">Rp {{ number_format($i['harga'], 0, ',', '.') }}</td>
                    <td class="text-right">Rp {{ number_format($i['qty'] * $i['harga'], 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <th class="text-right">Rp {{ number_format($total, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>

        <button onclick="window.print()" class="btn btn-secondary no-print">
            <i class="fas fa-print"></i> Print
        </button>
    </div>
</div>
@endsection