@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">FORM PENDAFTARAN PASIEN</h1>
            <form action="/konfirmasi" method="post">
                @csrf
                <div class="form-floating">
                    <label for="konfirmasi">Apakah anda sebelumnya sudah daftar sebelumnya ?</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="konfirmasi" name="konfirmasi" required autofocus>
                            <option selected>Pilihan...</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Selanjutnya</button>
            </form>
        </main>
    </div>
</div>
@endsection
