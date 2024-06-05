@extends('layouts.user.templateuser')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            @if($bansoso)
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>Tanggal Pengajuan</th>
                    <td>{{ $bansoso->created_at->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $bansoso->penduduk->NIK }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $bansoso->penduduk->nama }}</td>
                </tr>
                <tr>
                    <th>Pendapatan</th>
                    <td>
                        @if($bansoso->pendapatan == 3)
                            &lt; Rp. 1,000,000,00
                        @elseif($bansoso->pendapatan == 2)
                            Rp. 1,000,000,00 - Rp. 3,000,000,00
                        @else
                            &gt; Rp. 3,000,000,00
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tanggungan</th>
                    <td>
                        @if($bansoso->tanggungan == 3)
                            &lt; 3 orang
                        @elseif($bansoso->tanggungan == 2)
                            3 - 5 orang
                        @else
                            &gt; 5 orang
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>PBB</th>
                    <td>
                        @if($bansoso->pbb == 3)
                            &lt; Rp. 100,000,00
                        @elseif($bansoso->pbb == 2)
                            Rp. 100,000,00 - Rp. 300,000,00
                        @else
                            &gt; Rp. 300,000,00
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tagihan Air</th>
                    <td>
                        @if($bansoso->tag_air == 3)
                            &lt; Rp. 100,000,00
                        @elseif($bansoso->tag_air == 2)
                            Rp. 100,000,00 - Rp. 200,000,00
                        @else
                            &gt; Rp. 200,000,00
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tagihan Listrik</th>
                    <td>
                        @if($bansoso->tag_listrik == 3)
                            &lt; Rp. 100,000,00
                        @elseif($bansoso->tag_listrik == 2)
                            Rp. 100,000,00 - Rp. 200,000,00
                        @else
                            &gt; Rp. 200,000,00
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $bansoso->status }}</td>
                </tr>
            </table>
            @else
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @endif
            <a href="{{ url('/bansos') }}" class="btn btn-info btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
