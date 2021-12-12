@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Data Dokter</h1>
</div>

<div class="col-8">
    <form method="post" action="/dashboard/dokter/{{ $dokter->id_dokter }}" class="mb-5" enctype="multipart/form-data">
        @method('put')    
        @csrf
        <div class="mb-3">
            <label for="nip" class="form-label">Nomor Induk Pegawai (NIP)</label>
            <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" 
            required autofocus value="{{ old('nip', $dokter->nip) }}">
            @error('nip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter" name="nama_dokter" 
            required value="{{ old('nama_dokter', $dokter->nama_dokter) }}">
            @error('nama_dokter')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jk" name="jk" required>
                <option selected>Pilihan...</option>
                <option value="laki-laki" <?php if ($dokter->jk == "laki-laki") { echo 'selected';} ?>>Laki-laki</option>
                <option value="perempuan" <?php if ($dokter->jk == "perempuan") { echo 'selected';} ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="spesialis" class="form-label">Spesialis</label>
            <input type="text" class="form-control @error('spesialis') is-invalid @enderror" id="spesialis" name="spesialis" 
            required value="{{ old('spesialis', $dokter->spesialis) }}">
            @error('spesialis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_poliklinik" class="form-label">Poliklinik</label>
            <select class="form-select" id="id_poliklinik" name="id_poliklinik" required>
                <option selected>Pilihan...</option>
                @foreach($poliklinik as $poliklinik)
                    @if(old('id_poliklinik', $poliklinik->id_poliklinik) == $poliklinik->id_poliklinik)
                        <option value="{{ $poliklinik->id_poliklinik }}" selected >{{ $poliklinik->nama_poliklinik }}</option>
                    @else
                        <option value="{{ $poliklinik->id_poliklinik }}">{{ $poliklinik->namaid_poliklinik }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon Dokter</label>
            <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon"
            onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="12" 
            required value="{{ old('nomor_telepon', $dokter->nomor_telepon) }}">
            @error('nomor_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ubah Data Dokter</button>
    </form>
</div>

<script>
    
</script>
@endsection