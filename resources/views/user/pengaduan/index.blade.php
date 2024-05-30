@extends('layouts.user.templateuser')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pengaduan RW 04</h5>
            <button class="btn btn-primary mb-3" id="btnAjukan">Ajukan Pengaduan</button>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="post" action="{{ route('pengaduan.store') }}" id="formPengaduan" style="border: 1px solid #ced4da; border-radius: 5px; padding: 20px;">
                @csrf
                <h5 class="card-title">Form Pengaduan</h5>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                </div>
                <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Masukkan Pesan" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rt">RT</label>
                    <input type="text" class="form-control" id="rt" name="rt" placeholder="Masukkan RT" required>
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
    $(document).ready(function(){
        $('#btnAjukan').click(function(){
            $('#formPengaduan').toggle();
        });
    });
</script>
@endpush
