@extends('layouts.user.templateuser')

@section('content')
    @php
        $data = [
            'name' => 'Bambang Setai Kawan Boy',
            'nik' => '1234567891234567',
            'status' => 'Penduduk',
            'address' => 'RT 2 RW 2 no.12, Ds.Arjosari, Kec.Blimbing, Kab. Malang',
        ];
    @endphp
    <div class="container">
        <div class="avatar mb-3"></div>
        <h2>{{ $data['name'] }}</h2>
        <p>{{ $data['nik'] }}</p>
        <p>{{ $data['status'] }}</p>
        <p>{{ $data['address'] }}</p>
    </div>
@endsection

@push('styles')
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
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
