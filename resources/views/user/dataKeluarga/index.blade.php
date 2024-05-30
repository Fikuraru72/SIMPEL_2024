@extends('layouts.user.templateuser')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Keluarga</h5>
                <form action="{{ route('dataKeluarga.index') }}" method="GET">
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <div class="input-group mb-2">
                            <input type="text" name="id_penduduk" class="form-control" placeholder="Cari ID Penduduk...">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="submit" id="button-addon2">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>ID Penduduk</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Agama</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKeluarga as $keluarga)
                            <tr>
                                <td>{{ $keluarga->id_penduduk }}</td>
                                <td>{{ $keluarga->NIK }}</td>
                                <td>{{ $keluarga->nama }}</td>
                                <td>{{ $keluarga->TTL }}</td>
                                <td>{{ $keluarga->Agama }}</td>
                                <td>{{ $keluarga->JenisKelamin }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
