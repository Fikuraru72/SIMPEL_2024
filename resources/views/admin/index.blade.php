@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-primary text-white">
                <div id="downloads-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0 text-center">
                                <h1>10</h1>
                                <p class="card-title text-white">Jumlah RT</p>
                            </div>
                            <canvas height="133" id="downloads-chart-a"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-warning text-white">
                <div id="feedbacks-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0 text-center">
                                <h1>{{ $total->penduduk }}</h1>
                                <p class="card-title text-white">Jumlah Penduduk</p>
                            </div>
                            <canvas height="133" id="feedbacks-chart-a"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
            <div class="card border-0 bg-success text-white">
                <div id="customers-carousel" class="carousel slide card-carousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-body pb-0 text-center">
                                <h1>{{ $total->bansos }}</h1>
                                <p class="card-title text-white">Jumlah Penerima Bansos</p>
                            </div>
                            <canvas height="133" id="customers-chart-a"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7 grid-margin stretch-card mt-4">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="card-title">Jumlah Penerima Bansos</h3>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-5 grid-margin stretch-card mt-4">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="card-title">Diagram Penduduk</h3>
                    <div class="doughnutjs-wrapper d-flex justify-content-center">
                        <canvas id="pendudukChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Chart js -->
    <script src="{{ asset('template/assets/vendors/chart.js/chart.umd.js') }}""></script>

    <script>
        $(document).ready(function() {
            // Fetch Bansos Data
            $.ajax({
                url: 'admin/bansos-data',
                method: 'GET',
                success: function(data) {
                    var months = [];
                    var counts = [];
                    for (var i = 1; i <= 12; i++) {
                        months.push(i);
                        counts.push(data[i] || 0);
                    }

                    var ctx = document.getElementById('lineChart').getContext('2d');
                    var lineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Jumlah Pengajuan Bansos',
                                data: counts,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                                fill: false,
                                tension: 0.2
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    beginAtZero: true
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });

            // Fetch Penduduk Data
            function fetchPendudukData(rt = null) {
                $.ajax({
                    url: 'admin/penduduk-data',
                    method: 'GET',
                    data: { rt: rt },
                    success: function(data) {
                        var labels = Object.keys(data);
                        var counts = Object.values(data);

                        var ctx = document.getElementById('pendudukChart').getContext('2d');
                        var pendudukChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Jumlah Penduduk',
                                    data: counts,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                            }
                        });
                    }
                });
            }

            // Initial load
            fetchPendudukData();

        });
    </script>
@endpush
