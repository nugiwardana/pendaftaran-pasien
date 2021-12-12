@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah data pendaftaran pasien</h1>
</div>

<div class="col-8">
    <form method="post" action="/dashboard/pasien" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') 
            is-invalid @enderror" id="nama_lengkap" onkeyup="this.value = this.value.toUpperCase()"
            onkeypress="return event.charCode < 48 || event.charCode  >57"
            placeholder="Nama Lengkap Pasien" required autofocus value="{{ old('nama_lengkap') }}">
            @error('nama_lengkap')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Kependuduk (NIK)</label>
            <input type="text" name="nik" class="form-control @error('nik') 
            is-invalid @enderror" id="nik" maxlength="16" onkeypress="return event.charCode >= 48 && event.charCode <=57"
            placeholder="Bila tidak memiliki NIK boleh dikosongkan" value="{{ old('nik') }}">
            @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tmpt_lahir">Tempat lahir</label>
            <input type="text" name="tmpt_lahir" class="form-control @error('tmpt_lahir') 
            is-invalid @enderror" id="tmpt_lahir" placeholder="Tempat Lahir" required value="{{ old('tmpt_lahir') }}">
            @error('tmpt_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tgl_lahir">Tanggal lahir</label>
            <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') 
            is-invalid @enderror" id="tgl_lahir" placeholder="Tanggal Lahir" required value="{{ old('tgl_lahir') }}">
            @error('tgl_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jk">Jenis Kelamin</label>
            <div class="input-group mb-3">
                <select class="form-select" id="jk" name="jk" required>
                    <option selected>Pilihan...</option>
                    <option value="laki-laki" @if (old('jk') == 'laki-laki') selected="selected" @endif>Laki-laki</option>
                    <option value="perempuan" @if (old('jk') == 'perempuan') selected="selected" @endif>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="agama">Agama</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect"  onchange="cek_agama(this)" id="agama" name="agama" required>
                    <option selected>Pilihan...</option>
                    <option value="islam" @if (old('agama') == 'islam') selected="selected" @endif>Islam</option>
                    <option value="kristen" @if (old('agama') == 'kristen') selected="selected" @endif>Kristen (Protestan)</option>
                    <option value="katolik"  @if (old('agama') == 'katolik') selected="selected" @endif>Katolik</option>
                    <option value="hindu"  @if (old('agama') == 'hindu') selected="selected" @endif>Hindu</option>
                    <option value="budha"  @if (old('agama') == 'budha') selected="selected" @endif>Budha</option>
                    <option value="konghucu"  @if (old('agama') == 'konghucu') selected="selected" @endif>Konghucu</option>
                    <option value="lain-lain"  @if (old('agama') == 'lain-lain') selected="selected" @endif>Lain - lain</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat Lengkap</label>
            <input type="text" name="alamat" class="form-control @error('alamat') 
            is-invalid @enderror" id="alamat" placeholder="Alamat Lengkap Pasien" required value="{{ old('alamat') }}">
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kode_provinsi">Provinsi</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="kode_provinsi" name="kode_provinsi" required>
                    <option selected>Pilihan...</option>
                    @foreach($provinsi as $provinsi)
                        @if(old('kode_provinsi') == $provinsi->prov_id)
                            <option value="{{ $provinsi->prov_id }}" {{ old('kode_provinsi') == $provinsi->prov_id ? ' selected' : ' ' }}>{{ $provinsi->prov_name }}</option>
                        @else
                            <option value="{{ $provinsi->prov_id }}">{{ $provinsi->prov_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="kode_kabupaten">Kabupaten / Kota</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="kode_kabupaten" name="kode_kabupaten" required>
                    <option selected>Pilihan...</option>
                    @foreach($kabupaten as $kabupaten)
                        @if(old('kode_kabupaten') == $kabupaten->city_id)
                            <option value="{{ $kabupaten->city_id }}" {{ old('kode_kabupaten') == $kabupaten->city_id ? ' selected' : ' ' }}>{{ $kabupaten->city_name }}</option>
                        @else
                        <option value="{{ $kabupaten->city_id }}">{{ $kabupaten->city_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="kode_kecamatan">Kecamatan</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="kode_kecamatan" name="kode_kecamatan" required>
                    <option selected>Pilihan...</option>
                    @foreach($kecamatan as $kecamatan)
                        @if(old('kode_kecamatan') == $kecamatan->dis_id)
                            <option value="{{ $kecamatan->dis_id }}" {{ old('kode_kecamatan') == $kecamatan->dis_id ? ' selected' : ' ' }}>{{ $kecamatan->dis_name }}</option>
                        @else
                            <option value="{{ $kecamatan->dis_id }}">{{ $kecamatan->dis_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="kode_kelurahan">Kelurahan / Desa</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="kode_kelurahan" name="kode_kelurahan" required>
                    <option selected>Pilihan...</option>
                    @foreach($kelurahan as $kelurahan)
                        @if(old('kode_kelurahan') == $kelurahan->subdis_id)
                            <option value="{{ $kelurahan->subdis_id }}" {{ old('kode_kelurahan') == $kelurahan->subdis_id ? ' selected' : ' ' }}>{{ $kelurahan->subdis_name }}</option>
                        @else
                            <option value="{{ $kelurahan->subdis_id }}">{{ $kelurahan->subdis_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') 
            is-invalid @enderror" id="nomor_telepon" placeholder="Nomor Telepon Pasien" 
            onkeypress="return event.charCode >= 48 && event.charCode <=57"
            maxlength="12" required value="{{ old('nomor_telepon') }}">
            @error('nomor_telepon')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pendidikan">Pendidikan</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="pendidikan" name="pendidikan" required>
                    <option selected>Pilihan...</option>
                    <option value="tidak sekolah" @if (old('pendidikan') == 'tidak sekolah') selected="selected" @endif>Tidak Sekolah</option>
                    <option value="SD" @if (old('pendidikan') == 'SD') selected="selected" @endif>SD</option>
                    <option value="SLTP" @if (old('pendidikan') == 'SLTP') selected="selected" @endif>SLTP Sederajat</option>
                    <option value="SLTA" @if (old('pendidikan') == 'SLTA') selected="selected" @endif>SLTA Sederajat</option>
                    <option value="D1 - D3" @if (old('pendidikan') == 'D1 - D3') selected="selected" @endif>D1 - D3 Sederajat</option>
                    <option value="D4" @if (old('pendidikan') == 'D4') selected="selected" @endif>D4</option>
                    <option value="S1" @if (old('pendidikan') == 'S1') selected="selected" @endif>S1</option>
                    <option value="S2" @if (old('pendidikan') == 'S2') selected="selected" @endif>S2</option>
                    <option value="S3" @if (old('pendidikan') == 'S3') selected="selected" @endif>S3</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="pekerjaan">Pekerjaan</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="pekerjaan" name="pekerjaan" required>
                    <option selected>Pilihan...</option>
                    <option value="tidak bekerja" @if (old('pekerjaan') == 'tidak bekerja') selected="selected" @endif>Tidak Bekerja</option>
                    <option value="PNS" @if (old('pekerjaan') == 'PNS') selected="selected" @endif>PNS</option>
                    <option value="TNI/PORLI" @if (old('pekerjaan') == 'TNI/PORLI') selected="selected" @endif>TNI/PORLI</option>
                    <option value="BUMN" @if (old('pekerjaan') == 'BUMN') selected="selected" @endif>BUMN</option>
                    <option value="pegawai swasta / wirausaha" @if (old('pekerjaan') == 'pegawai swasta / wirausaha') selected="selected" @endif>Pegawai Swasta/ Wirausaha</option>
                    <option value="lain-lain" @if (old('pekerjaan') == 'lain-lain') selected="selected" @endif>Lain - lain</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="status_pernikahan">Status Pernikahan</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="status_pernikahan" name="status_pernikahan" required>
                    <option selected>Pilihan...</option>
                    <option value="belum kawin" @if (old('status_pernikahan') == 'belum kawin') selected="selected" @endif>Belum Kawin</option>
                    <option value="kawin" @if (old('status_pernikahan') == 'kawin') selected="selected" @endif>Kawin</option>
                    <option value="cerai hidup" @if (old('status_pernikahan') == 'cerai hidup') selected="selected" @endif>Cerai Hidup</option>
                    <option value="cerai mati" @if (old('status_pernikahan') == 'cerai mati') selected="selected" @endif>cerai Mati</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="id_dokter">Dokter</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="id_dokter" name="id_dokter" required>
                    <option selected>Pilihan...</option>
                    @foreach($dokter as $dokter)
                        @if(old('id_dokter') == $dokter->id_dokter)
                            <option value="{{ $dokter->id_dokter }}"  {{ old('id_dokter') == $dokter->id_dokter ? ' selected' : ' ' }}>{{ $dokter->nama_dokter }} | {{ $dokter->spesialis }} </option>
                        @else
                            <option value="{{ $dokter->id_dokter }}">{{ $dokter->nama_dokter }} | {{ $dokter->spesialis }} </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="id_poliklinik">Poliklinik</label>
            <div class="input-group mb-3">
                <select class="form-select theSelect" id="id_poliklinik" name="id_poliklinik" required>
                    <option selected>Pilihan...</option>
                    @foreach($poliklinik as $poliklinik)
                        @if(old('id_poliklinik') == $poliklinik->id_poliklinik)
                            <option value="{{ $poliklinik->id_poliklinik }}"  {{ old('id_poliklinik') == $poliklinik->id_poliklinik ? ' selected' : ' ' }}>{{ $poliklinik->nama_poliklinik }}</option>
                        @else
                            <option value="{{ $poliklinik->id_poliklinik }}">{{ $poliklinik->nama_poliklinik }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah pendaftaran pasien</button>
    </form>
</div>

    <script type="text/javascript">
        $(".theSelect").select2();

        function cek_agama(agama) {
            var value = agama.value;
            if (value =="lain-lain"){
            $("#agama_text").style.display="block";
            }
        }
    </script>
@endsection