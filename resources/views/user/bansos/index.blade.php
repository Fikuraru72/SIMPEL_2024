@extends('layouts.user.templateuser')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Riwayat Pengajuan Bantuan Sosial</h5>
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>No Pengajuan Bansos</th>
                        <th>Tanggal Pengajuan</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bansos as $bansoso)
                    <tr>
                        <td>{{ $bansoso->id_alternatif}}</td>
                        <td>{{ $bansoso->created_at }}</td>
                        <td>{{ $bansoso->penduduk->NIK }}</td>
                        <td>{{ $bansoso->penduduk->nama }}</td>
                        <td>{{ $bansoso->status }}</td>
                        <td>
                            <a href="{{ url('/bansos/detail/'. Auth::user()->id_penduduk) }}">
                                <button class="btn btn-warning btn-sm">Detail</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pengajuan Bantuan Sosial</h5>
            <button class="btn btn-primary mb-3" id="btnAjukan">Buat Pengajuan</button>

            <form method="post" action="" id="formPengaduan"
                style="display: none; border: 1px solid #ced4da; border-radius: 5px; padding: 20px;">
                @csrf
                <h5 class="card-title">Form Pengajuan</h5>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="pendapatan">Pendapatan</label>
                    <select class="form-control" id="pendapatan" name="pendapatan">
                        <option value="" disabled selected>Pilih Pendapatan</option>
                        <option value="3">&lt; Rp. 1,000,000,00</option>
                        <option value="2">Rp. 1,000,000,00 - Rp. 3,000,000,00</option>
                        <option value="1">&gt; Rp. 3,000,000,00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggungan">Tanggungan yang Belum Bekerja</label>
                    <select class="form-control" id="tanggungan" name="tanggungan">
                        <option value="" disabled selected>Pilih Tanggungan</option>
                        <option value="3">&lt; 3 orang</option>
                        <option value="2">3 - 5 orang</option>
                        <option value="1">&gt; 5 orang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pbb">Pajak Bumi dan Bangunan</label>
                    <select class="form-control" id="pbb" name="pbb">
                        <option value="" disabled selected>Pilih Pajak</option>
                        <option value="3">&lt; Rp. 100,000,00</option>
                        <option value="2">Rp. 100,000,00 - Rp. 300,000,00</option>
                        <option value="1">&gt; Rp. 300,000,00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tagAir">Tagihan Air</label>
                    <select class="form-control" id="tagAir" name="tagAir">
                        <option value="" disabled selected>Pilih Tagihan</option>
                        <option value="3">&lt; Rp. 100,000,00</option>
                        <option value="2">Rp. 100,000,00 - Rp. 200,000,00</option>
                        <option value="1">&gt; Rp. 200,000,00</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tagListrik">Tagihan Listrik</label>
                    <select class="form-control" id="tagListrik" name="tagListrik">
                        <option value="" disabled selected>Pilih Tagihan</option>
                        <option value="3">&lt; Rp. 100,000,00</option>
                        <option value="2">Rp. 100,000,00 - Rp. 200,000,00</option>
                        <option value="1">&gt; Rp. 200,000,00</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btnAjukan').click(function() {
            $('#formPengaduan').toggle();
        });
    });
</script>
@endpush
