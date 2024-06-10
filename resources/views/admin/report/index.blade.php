@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Penduduk</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm" id="table-report">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Subjek</th>
                                <th>Pesan</th>
                                <th>rt</th>
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

@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#table-report').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('laporan/list') }}",
                    dataType: "json",
                    type: "POST",
                    // data: function(d) {
                    //     d.kategori_nama = $('#kategori_nama').val();
                    // }
                },
                columns: [{
                        data: "id_pengaduan",
                    },
                    {
                        data: 'subjek'
                    },
                    {
                        data: 'pesan'
                    },
                    {
                        data: 'rt'
                    },
                    {
                        data : 'created_at'
                    }
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
