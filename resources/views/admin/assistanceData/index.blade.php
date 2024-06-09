@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-body d-flex justify-content-between align-items-end">
                    <h5 class="card-title">Data Bantuan Sosial</h5>
                    <div>
                        <button type="button" class="btn btn-warning btn-rounded btn-icon me-3 mt-2 mt-xl-0"
                            data-toggle="modal" data-target="#ranking">
                            <i class="mdi mdi-format-list-numbered"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-rounded btn-icon me-3 mt-2 mt-xl-0"
                            data-toggle="modal" data-target="#bansos-baru">
                            <i class="mdi mdi-plus"></i>
                        </button>
                    </div>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="modal fade" id="bansos-baru" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Penerima Bantuan Sosial Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <x-modal.store-asisstance-data />
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ranking" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Penduduk Penerima Bantuan Sosial</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Tabel untuk menampilkan ranking -->
                                <table class="table table-bordered table-striped table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $datas)
                                            <tr>
                                                <td>{{ $datas->ranking }}</td>
                                                <td>{{ $datas->NIK }}</td>
                                                <td>{{ $datas->nama }}</td>
                                                <td>{{ $datas->total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm display nowrap"
                        id="table-Assistance" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NO.KK</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                    </table>

                    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Bantuan Sosial</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <x-modal.detail-bansos />
                            </div>
                        </div>
                    </div>

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
                    },
                    {
                        data: "NoKK",
                    },
                    {
                        data: "nama"
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }
                ],
                fixedHeader: true,
                lengthChange: false,
                pageLength: 5
            });
        });
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
