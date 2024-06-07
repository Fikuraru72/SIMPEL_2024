@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-body d-flex justify-content-between align-items-end">
                    <h5 class="card-title">Data Bantuan Sosial</h5>
                    <div>
                        <button type="button" class="btn btn-primary btn-rounded btn-icon me-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-format-list-numbered"></i>
                        </button>
                        <button type="button" class="btn btn-info btn-rounded btn-icon me-3 mt-2 mt-xl-0"
                            data-toggle="modal" data-target="#bansos-baru">
                            <i class="mdi mdi-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="bansos-baru" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Penduduk Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <x-modal.store-asisstance-data />
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm" id="table-Assistance">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Pendapatan</th>
                                <th>Tanggungan</th>
                                <th>pbb</th>
                                <th>tagihanAir</th>
                                <th>tagihanListrik</th>
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

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#table-Assistance').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('dataBansos/list') }}",
                    dataType: "json",
                    type: "POST",
                    // data: function(d) {
                    //     d.kategori_nama = $('#kategori_nama').val();
                    // }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    }, {
                        data: "NoKK",
                    }, {
                        data: "nama"
                    }, {
                        data: "pendapatan",
                    }, {
                        data: "tanggungan",
                    }, {
                        data: "pbb",
                    }, {
                        data: "tagihanAir",
                    }, {
                        data: "tagihanListrik",
                    },

                ],
                lengthChange: false,
                pageLength: 5,
                scrollX: false
            });
        });
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
