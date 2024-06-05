@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
            </div>
        @endif

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="mt-3 d-flex justify-content-between align-items-end">
                        <h3 class="card-title">Matriks Keputusan</h3>
                    </div>

                    <div class="table-responsive p-4">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Pendapatan</th>
                                    <th>Tanggungan</th>
                                    <th>PBB</th>
                                    <th>Tagihan Air</th>
                                    <th>Tagihan Listrik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bansos as $items)
                                    <tr>
                                        <td>{{ $items->penduduk->NIK }}</td>
                                        <td>{{ $items->penduduk->nama }}</td>
                                        <td>{{ $items->pendapatan }}</td>
                                        <td>{{ $items->tanggungan }}</td>
                                        <td>{{ $items->pbb }}</td>
                                        <td>{{ $items->tagihanAir }}</td>
                                        <td>{{ $items->tagihanListrik }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <br><br>
                    <h3 class="card-title">Matriks Ternormalisasi</h3>

                    <div class="table-responsive p-4">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Pendapatan</th>
                                    <th>Tanggungan</th>
                                    <th>PBB</th>
                                    <th>Tagihan Air</th>
                                    <th>Tagihan Listrik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($normalisasiMatriks as $items)
                                    <tr>
                                        <td>{{ $items['NIK'] }}</td>
                                        <td>{{ $items['Nama'] }}</td>
                                        <td>{{ $items['Pendapatan'] }}</td>
                                        <td>{{ $items['Tanggungan'] }}</td>
                                        <td>{{ $items['PBB'] }}</td>
                                        <td>{{ $items['TagihanAir'] }}</td>
                                        <td>{{ $items['TagihanListrik'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <br><br>
                    <h3 class="card-title">Matriks Normalisasi Terbobot</h3>

                    <div class="table-responsive p-4">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Pendapatan</th>
                                    <th>Tanggungan</th>
                                    <th>PBB</th>
                                    <th>Tagihan Air</th>
                                    <th>Tagihan Listrik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matriksNormalisasiTertimbang as $items)
                                    <tr>
                                        <td>{{ $items['NIK'] }}</td>
                                        <td>{{ $items['Nama'] }}</td>
                                        <td>{{ $items['Pendapatan'] }}</td>
                                        <td>{{ $items['Tanggungan'] }}</td>
                                        <td>{{ $items['PBB'] }}</td>
                                        <td>{{ $items['TagihanAir'] }}</td>
                                        <td>{{ $items['TagihanListrik'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <br><br>
                    <h3 class="card-title">Perankingan</h3>

                    <form method="POST" action="{{ route('admin.moora.store') }}">
                        @csrf
                        <div class="table-responsive p-4">
                            <table class="table table-bordered table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Total</th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ranking as $items)
                                        <tr>
                                            <td>{{ $items['NIK'] }}</td>
                                            <td>{{ $items['Nama'] }}</td>
                                            <td>{{ $items['Total'] }}</td>
                                            <td>{{ $items['Ranking'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" name="simpan" class="btn btn-success mt-4"
                                style="float: right">Simpan</button>
                            <br><br>
                        </div>
                    </form>
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
