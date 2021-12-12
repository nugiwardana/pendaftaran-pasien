@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah data Poliklinik</h1>
</div>

<div class="col-8">
    <form method="post" action="/dashboard/poliklinik" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_poliklinik" class="form-label">Nama Poliklinik</label>
            <input type="text" class="form-control @error('nama_poliklinik') is-invalid @enderror" id="nama_poliklinik" name="nama_poliklinik" 
            required value="{{ old('nama_poliklinik') }}">
            @error('nama_poliklinik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" 
            required value="{{ old('keterangan') }}">
            @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Poliklinik</button>
    </form>
</div>

<script>
    
</script>
@endsection