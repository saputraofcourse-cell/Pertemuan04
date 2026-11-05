@extends('admin.admin_layouts.template')

@section('title', 'Chart')
@section('page', 'Halaman Chart')

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Yearly User Joined</h6>
    </div>
    <div class="card-body">
        <canvas id="grafikUser" height="100"></canvas>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('template/startbootstrap-sb-admin-2-gh-pages/vendor/chart.js/Chart.min.js') }}"></script>
<script>
    new Chart(document.getElementById('grafikUser'), {
        type: 'bar',
        data: {
            labels: @json($tahun),
            datasets: [{
                label: 'User',
                data: @json($jumlah),
                backgroundColor: 'rgba(255, 99, 132, 0.4)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1
            }]
        },
        options: {
            scales: { yAxes: [{ ticks: { beginAtZero: true, stepSize: 1 } }] }
        }
    });
</script>
@endpush