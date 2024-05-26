@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Penduduk</h5>
                @if ($dataAssitance->isEmpty())
                    <h5>Tidak Ada Pengajuan</h5>
                @else
                    @foreach ($dataAssitance as $item)
                        <x-card nama="{{ $item->penduduk->nama }}" id_alternatif="{{ $item->id_alternatif }}" />
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    <x-modal.reject />
    <x-modal.confirmation />
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
