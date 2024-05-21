@extends('layouts.user.templateuser')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Keluarga</h5>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Cari...">
                            <button class="btn btn-info" type="button" id="button-addon2" style="">Cari</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                        </thead>

                        <tbody>
                            <tr>
                            <td>
                                1
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                Bambang Setai Kawan Boy
                            </td>
                            <td class="py-1">
                                <a href="{{ url('/dataKeluarga/detail')}}">
                                    <button class="btn btn-warning btn-sm">Detail</button>
                                </a>
                            </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
