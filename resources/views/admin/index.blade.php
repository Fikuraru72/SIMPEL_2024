@extends('layouts.template')

@section('content')

<div class="row">
    <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
      <div class="card border-0 bg-primary text-white">
        <div id="downloads-carousel" class="carousel slide card-carousel" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card-body pb-0 text-center">
                {{--  --}}
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
                <h1>100</h1>
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
                <h1>10</h1>
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
            <h3 class="card-title">Pertumbuhan Penduduk</h3>
            <canvas id="lineChart"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-5 grid-margin stretch-card mt-4">
        <div class="card p-4">
          <div class="card-body">
            <h3 class="card-title">Diagram Penduduk</h3>
            <div class="doughnutjs-wrapper d-flex justify-content-center">
              <canvas id="doughnutChart"></canvas>
            </div>
          </div>
        </div>
      </div>
  </div>

  @endsection

  @push('js')
        <!-- Chart js -->
        <script src="{{ asset('tamplate/assets/vendors/chart.js/chart.umd.js') }}""></script>

        <!-- Custom chart js for this page-->
        <script src="{{ asset('tamplate/assets/js/chart.js') }}"></script>
        <!-- End custom chart js for this page-->
  @endpush
