@extends('layouts.template')

@section('content')
<div class="container">
    <div class="avatar mb-3"></div>
    <h2>{{ $user->nama }}</h2>
    <p>NIK  :  {{ $user->NIK }}</p>
    <p>No KK : {{ $user->NoKK }}</p>
    <p>Tanggal Lahir : {{ $user->TTL }}</p>
    <p>Agama : {{ $user->Agama }}</p>
    <p>Jenis Kelamin : {{ $user->JenisKelamin }}</p>
    <p>RT : {{ $user->rt }}</p>
    <p>Alamat  : {{ $user->Alamat }}</p>
</div>
@endsection

@push('css')
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f0f0f0;
    }
    .container {
        background-color: #fff;
        padding: 20px;
        text-align: center;
    }
    .avatar {
        width: 100px;
        height: 100px;
        background-color: #ddd;
        border-radius: 50%;
        margin: 0 auto;
    }


</style>
@endpush
@push('js')

@endpush
