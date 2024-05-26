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
                    <th>Tanggal Pengajuan</th>
                    <td>01-01-2024</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>1234567891234567</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>Bambang Setai Kawan Boy</td>
                </tr>
                <tr>
                    <th>Pendapatan</th>
                    <td>Rp. 1,000,000,00 - Rp. 3,000,000,00</td>
                </tr>
                <tr>
                    <th>Tanggungan</th>
                    <td>3 - 5 orang</td>
                </tr>
                <tr>
                    <th>PBB</th>
                    <td>Rp. 100,000,00 - Rp. 300,000,00</td>
                </tr>
                <tr>
                    <th>Tagihan Air</th>
                    <td>Rp. 100,000,00 - Rp. 200,000,00</td>
                </tr>
                <tr>
                    <th>Tagihan Listrik</th>
                    <td>Rp. 100,000,00 - Rp. 200,000,00</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>Diproses</td>
                </tr>
            </table>
            {{-- @endempty --}}
            <a href="{{ url('/bansos') }}" class="btn btn-info btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush
