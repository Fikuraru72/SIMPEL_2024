@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {{-- <h5 class="card-title">Data Penduduk</h5>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Cari..." id="search-input">
                            <button class="btn btn-info" type="button" id="search-button">Cari</button>
                        </div>
                    </div>
                    <div class="ml-auto">
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-clock-outline text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal"
                            data-target="#penduduk-baru">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                    </div> --}}
                <div class="card-body d-flex justify-content-between align-items-end">
                    <h5 class="card-title">Data Penduduk</h5>
                    <div>
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-clock-outline text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0" data-toggle="modal"
                            data-target="#penduduk-baru">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="penduduk-baru">
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

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm" id="table-population">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>No.KK</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>JK</th>
                                <th>RT</th>
                                <th>Alamat</th>
                                <th>Status</th>
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

@push('css')
    <style>
        table {
            width: 100% !important;
        }


        .dataTables_wrapper .dataTables_filter input {
            width: 250px;
            height: 40px;
            margin: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;

        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#table-population').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('datapenduduk/list') }}",
                    dataType: "json",
                    type: "POST",
                    // data: function(d) {
                    //     d.kategori_nama = $('#kategori_nama').val();
                    // }
                },
                columns: [{
                        data: "id_penduduk",
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'NIK'
                    },
                    {
                        data: 'NoKK'
                    },
                    {
                        data: 'TTL'
                    },
                    {
                        data: 'Agama'
                    },
                    {
                        data: 'Jenis Kelamin'
                    },
                    {
                        data: 'Jenis Kelamin'
                    },
                    {
                        data: 'Jenis Kelamin'
                    },
                    {
                        data: 'Jenis Kelamin'
                    },
                ],
                lengthChange: false, // Disable the "Show entries" dropdown
                pageLength: 10, // Set the number of entries per page to 10
                // searching: false // Disable the search bar
            });
        });
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
