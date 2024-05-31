@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-body d-flex justify-content-between align-items-end">
                    <h3 class="card-title">Data Bansos Terpilih</h3>
                    <div>
                        <form method="POST" action="{{ url('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning me-3 mt-2 mt-xl-0">
                                <i class="mdi mdi-logout text-muted"></i>
                            </button>
                        </form>
                    </div>
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
                            @foreach($bansos as $items)
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
                <h3 class="card-title">Normalisasi</h3>

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

                            <?php

                            $pembagi1 = 0;
                            $pembagi2 = 0;
                            $pembagi3 = 0;
                            $pembagi4 = 0;
                            $pembagi5 = 0;

                            // $id_alternatifs = $_POST['id_alternatif'];

                            foreach ($bansos as $items) {
                                // $data = mysqli_query($con, "SELECT * FROM bansos WHERE id_alternatif = '$id_alternatif' ");
                                // while ($bansos = mysqli_fetch_assoc($data)) {
                                    $pembagi1 += pow($items->pendapatan, 2);
                                    $akar1 = sqrt($pembagi1);

                                    $pembagi2 += pow($items->tanggungan, 2);
                                    $akar2 = sqrt($pembagi2);

                                    $pembagi3 += pow($items->pbb, 2);
                                    $akar3 = sqrt($pembagi3);

                                    $pembagi4 += pow($items->tagihanAir, 2);
                                    $akar4 = sqrt($pembagi4);

                                    $pembagi5 += pow($items->tagihanListrik, 2);
                                    $akar5 = sqrt($pembagi5);
                                // }
                            }
                            ?>
                            <?php
                            foreach ($bansos as $items) { 
                            ?>
                                <tr>
                                    <td>{{ $items->penduduk->NIK }}</td>
                                    <td>{{ $items->penduduk->nama }}</td>
                                    <td>
                                        <?php $c1 = $items->pendapatan / $akar1;
                                        echo round($c1, 4); ?>
                                    </td>
                                    <td>
                                        <?php $c2 = $items->tanggungan / $akar2;
                                        echo round($c2, 4); ?>
                                    </td>
                                    <td>
                                        <?php $c3 = $items->pbb / $akar3;
                                        echo round($c3, 4); ?>
                                    </td>
                                    <td>
                                        <?php $c4 = $items->tagihanAir / $akar4;
                                        echo round($c4, 4); ?>
                                    </td>
                                    <td>
                                        <?php $c5 = $items->tagihanListrik / $akar5;
                                        echo round($c5, 4); ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </thead>
                        <tbody>
                            @foreach($bansos as $bansos)
                                <tr>
                                    <td>{{ $bansos->penduduk->NIK }}</td>
                                    <td>{{ $bansos->penduduk->nama }}</td>
                                    <td>{{ round($bansos->pendapatan / $akar1, 4) }}</td>
                                    <td>{{ round($bansos->tanggungan / $akar2, 4) }}</td>
                                    <td>{{ round($bansos->pbb / $akar3, 4) }}</td>
                                    <td>{{ round($bansos->tagihanAir / $akar4, 4) }}</td>
                                    <td>{{ round($bansos->tagihanListrik / $akar5, 4) }}</td>
                                </tr>
                            @endforeach
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
