@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-body d-flex justify-content-between align-items-end">
                    <h5 class="card-title">Data Penduduk</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm" id="table-population">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>No.KK</th>
                                <th>RT</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                    </table>
                </div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true" id="modal-detail">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="storePenduduk">Detail Data Penduduk</h5>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <x-modal.detail-penduduk />
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#table-population').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('riwayatPenduduk/list') }}",
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
                        data: 'rt'
                    },
                    {
                        data: 'status_warga'
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
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
