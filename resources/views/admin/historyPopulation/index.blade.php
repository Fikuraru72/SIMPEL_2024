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
                                <th>Tgl Lahir</th>
                                <th>Agama</th>
                                <th>JK</th>
                                <th>RT</th>
                                <th>Alamat</th>
                                <th>Tanggal</th>
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
                        data: 'TTL'
                    },
                    {
                        data: 'Agama'
                    },
                    {
                        data: 'JenisKelamin'
                    },
                    {
                        data: 'rt'
                    },
                    {
                        data: 'Alamat'
                    },
                    {
                        data: 'updated_at'
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
