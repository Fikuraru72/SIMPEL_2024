@extends('layouts.template')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Penduduk</h5>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Cari...">
                            <button class="btn btn-info" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subjek</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
