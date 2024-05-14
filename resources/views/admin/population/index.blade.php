@extends('layouts.template')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Penduduk</h5>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div> <!-- Mengubah class menjadi 'ml-auto' agar search bar berada di sebelah kiri -->
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Cari...">
                            <button class="btn btn-info" type="button" id="button-addon2">Cari</button>
                        </div>
                    </div>
                    <div class="ml-auto"> <!-- Menambahkan 'ml-auto' untuk menempatkan tombol-tombol di sebelah kanan -->
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-clock-outline text-muted"></i>
                        </button>
                        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                            <i class="mdi mdi-plus text-muted"></i>
                        </button>
                    </div>
                </div>
                <div class="table-responsive pt-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>No.KK</th>
                                <th>Tanggal Lahir</th>
                                <th>Ummur</th>
                                <th>RT</th>
                                <th>Alamat</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <td>
                                1
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                Bambang Setai Kawan Boy
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                01-01-2000
                            </td>
                            <td>
                                24
                            </td>
                            <td>
                                09
                            </td>
                            <td>
                                Jl. Kembang Turi
                            </td>
                            <td>
                                Jomnblo
                            </td>
                        </tr>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                Bambang Setai Kawan Boy
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                01-01-2000
                            </td>
                            <td>
                                24
                            </td>
                            <td>
                                09
                            </td>
                            <td>
                                Jl. Kembang Turi
                            </td>
                            <td>
                                Jomnblo
                            </td>
                        </tr>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                Bambang Setai Kawan Boy
                            </td>
                            <td>
                                1234567891234567
                            </td>
                            <td>
                                01-01-2000
                            </td>
                            <td>
                                24
                            </td>
                            <td>
                                09
                            </td>
                            <td>
                                Jl. Kembang Turi
                            </td>
                            <td>
                                Jomnblo
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection