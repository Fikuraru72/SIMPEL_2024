@extends('layouts.user.templateuser')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            {{-- @empty($user)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else --}}
            <table class="table table-bordered table-striped table-hover tablesm">
                <tr>
                    <th>Nama</th>
                    <td>Bambang Setai Kawan Boy</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>1234567891234567</td>
                </tr>
                <tr>
                    <th>No. KK</th>
                    <td>111111111111111</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>01-01-2025</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>Islam</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>Laki-laki</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>RT 2 RW 2 no.12, Ds.Arjosari, Kec.Blimbing, Kab. Malang</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>Menikah</td>
                </tr>
            </table>
            {{-- @endempty --}}
            <a href="{{ url('/dataKeluarga') }}" class="btn btn-info btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
