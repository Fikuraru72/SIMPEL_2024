@props([
    'nama' => '',
    'id_alternatif' => '',
])
<div class="card" style="margin: 20px;">
    <h5 class="card-header" style="background-color: rgb(17, 143, 227); color: white;">Pengajuan Data</h5>
    <div class="card-body">
        <h5 class="card-title">{{ $nama }}</h5>
        <p class="card-text">Pengajuan Sebagai Penerima Bansos</p>
        <div style="text-align: right;">
            <form action="verifikasiBansos/tolak/{{$id_alternatif}}" method="POST" style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
            <button type="button" class="btn btn-primary confirmation" data-toggle="modal"
                data-target="#modal-confirmation" data-id="{{ $id_alternatif }}">
                Terima
            </button>
        </div>
    </div>
</div>
