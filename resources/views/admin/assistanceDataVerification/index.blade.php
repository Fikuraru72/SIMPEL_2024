@extends('layouts.template')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Penduduk</h5>

                @foreach ($dataAssitance as $item)
                    <x-card nama="{{ $item->penduduk->nama }}" id_alternatif="{{ $item->id_alternatif }}" />
                @endforeach


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
