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

                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dataKeluarga as $index => $keluarga)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $keluarga->NIK }}</td>
                                <td>{{ $keluarga->nama }}</td>
                                <td class="py-1">
                                    <a href="{{ url('/dataKeluarga/detail', ['id' => $keluarga->id]) }}">
                                        <button class="btn btn-warning btn-sm">Detail</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @if ($dataKeluarga->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data yang ditemukan.</td>
                            </tr>
                        @endif
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
