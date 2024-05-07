@extends('layouts.tamplate')

@section('content')

<div class="row">
    <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
      <div class="card border-0 bg-primary text-white">
        <div id="downloads-carousel" class="carousel slide card-carousel" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card-body pb-0">
                <p class="card-title text-white">Downloads</p>
                <h1>8543</h1>
                <h4>Growth 58%</h4>
              </div>
              <canvas height="110" id="downloads-chart-a"></canvas>
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
              <div class="card-body pb-0">
                <p class="card-title text-white">feedbacks</p>
                <h1>3568</h1>
                <h4>Growth 12%</h4>
              </div>
              <canvas height="110" id="feedbacks-chart-a"></canvas>
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
              <div class="card-body pb-0">
                <p class="card-title text-white">customers</p>
                <h1>4567</h1>
                <h4>Growth 31%</h4>
              </div>
              <canvas height="110" id="customers-chart-a"></canvas>
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
            <h4 class="card-title">Line chart</h4>
            <canvas id="lineChart"></canvas>
          </div>
        </div>
      </div>

      <div class="col-lg-5 grid-margin stretch-card mt-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Doughnut chart</h4>
            <div class="doughnutjs-wrapper d-flex justify-content-center">
              <canvas id="doughnutChart"></canvas>
            </div>
          </div>
        </div>
      </div>
  </div>








  @endsection
