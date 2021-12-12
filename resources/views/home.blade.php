@extends('layouts.main')

@section('container')
    <div class="container text-center">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <h1>SELAMAT DATANG DI APLIKASI PENDAFTARAN PASIEN RUMAH SAKIT ROTINSULU</h1>
        <img src="img/{{ $image }}" alt="home" width="100%" class="img-thumbnail">
        <div class="jumbotron jumbotron-fluid mt-3">
            <h2 class="display-7">APLIKASI UNTUK PENDAFTARAN PASIEN RUMAH SAKIT ROTINSULU</h2>
            <hr class="my-8">
            <h2 class="display-6">CARA PENGISIAN</h2>
                <p class="lead">Untuk cara pengisian, klik tombol DAFTAR PASIEN, kemudian mengisi form yang sudah disediakan oleh aplikasi tersebut. </p>
            <hr class="my-8">
                <p>SILAHKAN KLIK TOMBOL "DAFTAR PASIEN" UNTUK PENDAFTARAN PASIEN</p>
            <a class=" w-30 btn btn-lg btn-primary mt-3" href="/pendaftaran">DAFTAR PASIEN</a>
        </div>
    </div>
@endsection

