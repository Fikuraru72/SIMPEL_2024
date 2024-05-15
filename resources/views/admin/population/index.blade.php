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
                    <div class="ml-auto">
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-clock-outline text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal"
                            data-target=".bd-example-modal-lg">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Penduduk Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @include('layouts.modals.storePopulation')
                        </div>
                    </div>
                </div>

                <div class="table-responsive pt-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>No.KK</th>
                                <th>Tanggal Lahir</th>
                                <th>Ummur</th>
                                <th>RT</th>
                                <th>Alamat</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <td>
                                1
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                Bambang Setai Kawan Boy
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                01-01-2000
                            </td>
                            <td>
                                24
                            </td>
                            <td>
                                09
                            </td>
                            <td>
                                Jl. Kembang Turi
                            </td>
                            <td>
                                Jomnblo
                            </td>
                            </tr>
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
                                <td>
                                    1234567891234567
                                </td>
                                <td>
                                    01-01-2000
                                </td>
                                <td>
                                    24
                                </td>
                                <td>
                                    09
                                </td>
                                <td>
                                    Jl. Kembang Turi
                                </td>
                                <td>
                                    Jomnblo
                                </td>
                            </tr>
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
                                <td>
                                    1234567891234567
                                </td>
                                <td>
                                    01-01-2000
                                </td>
                                <td>
                                    24
                                </td>
                                <td>
                                    09
                                </td>
                                <td>
                                    Jl. Kembang Turi
                                </td>
                                <td>
                                    Jomnblo
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
