@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">FORM PENDAFTARAN PASIEN</h1>
            <p class="text-center">BILA ANDA SUDAH PERNAH DAFTAR SEBELUMNYA SILAHKAN MENGISI FORM YANG SUDAH DISEDIAKAN.</p>
            <form action="/daftar_lama/create">
                @csrf
                <div class="form-floating">
                    <label for="nik">Nomor Induk Penduduk (NIK)</label>
                    <input type="text" name="nik" class="form-control @error('nik') 
                    is-invalid @enderror" id="nik" max="16" onkeypress="return event.charCode >= 48 && event.charCode <=57"
                    placeholder="Nomor Induk Penduduk (NIK)" value="{{ old('nik') }}" required>
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Selanjutnya</button>
                    <a class="w-100 btn btn-lg btn-primary mt-3" href="/pendaftaran">Kembali</a>
            </form>
        </main>
    </div>
</div>
@endsection
