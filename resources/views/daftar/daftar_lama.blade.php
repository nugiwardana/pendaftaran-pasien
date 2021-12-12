@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">FORM PENDAFTARAN PASIEN</h1>
            <p class="text-center">SILAHKAN MENGISI FORM YANG SUDAH DISEDIAKAN.</p>
            <form action="/daftar_lama" method="post">
                @csrf
                <div class="form-floating">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') 
                    is-invalid @enderror" id="nama_lengkap" onkeyup="this.value = this.value.toUpperCase()"
                    onkeypress="return event.charCode < 48 || event.charCode  >57"
                    placeholder="Nama Lengkap Pasien" required autofocus value="{{ old('nama_lengkap', $pasien->nama_lengkap) }}" readonly>
                    @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="nik">Nomor Induk Kependuduk (NIK)</label>
                    <input type="text" name="nik" class="form-control @error('nik') 
                    is-invalid @enderror" id="nik" maxlength="16" onkeypress="return event.charCode >= 48 && event.charCode <=57"
                    placeholder="Bila tidak memiliki NIK boleh dikosongkan" value="{{ old('nik', $pasien->nik) }}" readonly>
                    @error('nik')
                    <div class="invalid-feedback">
                        Nomor induk penduduk(NIK) yang di masukkan sudah terdaftar
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="tmpt_lahir">Tempat lahir</label>
                    <input type="text" name="tmpt_lahir" class="form-control @error('tmpt_lahir') 
                    is-invalid @enderror" id="tmpt_lahir" placeholder="Tempat Lahir" required value="{{ old('tmpt_lahir', $pasien->tmpt_lahir) }}" readonly>
                    @error('tmpt_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="tgl_lahir">Tanggal lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') 
                    is-invalid @enderror" id="tgl_lahir" placeholder="Tanggal Lahir" required value="{{ old('tgl_lahir', $pasien->tgl_lahir) }}" readonly>
                    @error('tgl_lahir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="jk">Jenis Kelamin</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="jk" class="form-control @error('jk') 
                    is-invalid @enderror" id="jk" placeholder="Tanggal Lahir" required value="{{ old('jk', $pasien->jk) }}" readonly>
                        <select class="custom-select" disabled="true">
                            <option selected>Pilihan...</option>
                            <option value="laki-laki" <?php if ($pasien->jk == "laki-laki") { echo 'selected';} ?>>Laki-laki</option>
                            <option value="perempuan" <?php if ($pasien->jk == "perempuan") { echo 'selected';} ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="agama">Agama</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="agama" class="form-control @error('agama') 
                    is-invalid @enderror" id="agama" required value="{{ old('agama', $pasien->agama) }}" readonly>
                        <select class="custom-select theSelect" disabled="true">
                            <option selected>Pilihan...</option>
                            <option value="islam" <?php if ($pasien->agama == "islam") { echo 'selected';} ?>>Islam</option>
                            <option value="kristen" <?php if ($pasien->agama == "kristen") { echo 'selected';} ?>>Kristen (Protestan)</option>
                            <option value="katolik"  <?php if ($pasien->agama == "katolik") { echo 'selected';} ?>>Katolik</option>
                            <option value="hindu" <?php if ($pasien->agama == "hindu") { echo 'selected';} ?>>Hindu</option>
                            <option value="budha"  <?php if ($pasien->agama == "budha") { echo 'selected';} ?>>Budha</option>
                            <option value="konghucu" <?php if ($pasien->agama == "konghucu") { echo 'selected';} ?>>Konghucu</option>
                            <option value="lain-lain"<?php if ($pasien->agama == "lain-lain") { echo 'selected';} ?>>Lain - lain</option>
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') 
                    is-invalid @enderror" id="alamat" placeholder="Alamat Lengkap Pasien" required value="{{ old('alamat', $pasien->alamat )}}" readonly>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="kode_provinsi">Provinsi</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="kode_provinsi" class="form-control @error('kode_provinsi') 
                    is-invalid @enderror" id="kode_provinsi" required value="{{ old('kode_provinsi', $pasien->kode_provinsi) }}" readonly>
                        <select class="custom-select theSelect" disabled="true">
                            <option selected>Pilihan...</option>
                            @foreach($provinsi as $provinsi)
                                @if(old('kode_provinsi', $pasien->kode_provinsi) == $provinsi->prov_id)
                                    <option value="{{ $provinsi->prov_id }}" selected >{{ $provinsi->prov_name }}</option>
                                @else
                                    <option value="{{ $provinsi->prov_id }}">{{ $provinsi->prov_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="kode_kabupaten">Kabupaten / Kota</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="kode_kabupaten" class="form-control @error('kode_kabupaten') 
                    is-invalid @enderror" id="kode_kabupaten" required value="{{ old('kode_kabupaten', $pasien->kode_kabupaten) }}" readonly>
                        <select class="custom-select theSelect" disabled="true">
                            <option selected>Pilihan...</option>
                            @foreach($kabupaten as $kabupaten)
                                @if(old('kode_kabupaten', $pasien->kode_kabupaten) == $kabupaten->city_id)
                                    <option value="{{ $kabupaten->city_id }}" selected>{{ $kabupaten->city_name }}</option>
                                @else
                                <option value="{{ $kabupaten->city_id }}">{{ $kabupaten->city_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="kode_kecamatan">Kecamatan</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="kode_kecamatan" class="form-control @error('kode_kecamatan') 
                    is-invalid @enderror" id="kode_kecamatan" required value="{{ old('kode_kecamatan', $pasien->kode_kecamatan) }}" readonly>
                        <select class="custom-select theSelect" disabled="true">
                            <option selected>Pilihan...</option>
                            @foreach($kecamatan as $kecamatan)
                                @if(old('kode_kecamatan', $pasien->kode_kecamatan) == $kecamatan->dis_id)
                                    <option value="{{ $kecamatan->dis_id }}" selected>{{ $kecamatan->dis_name }}</option>
                                @else
                                    <option value="{{ $kecamatan->dis_id }}">{{ $kecamatan->dis_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="kode_kelurahan">Kelurahan / Desa</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="kode_kelurahan" class="form-control @error('kode_kelurahan') 
                    is-invalid @enderror" id="kode_kelurahan" required value="{{ old('kode_kelurahan', $pasien->kode_kelurahan) }}" readonly>
                        <select class="custom-select theSelect" disabled="true">
                            <option selected>Pilihan...</option>
                            @foreach($kelurahan as $kelurahan)
                                @if(old('kode_kelurahan', $pasien->kode_kelurahan) == $kelurahan->subdis_id)
                                    <option value="{{ $kelurahan->subdis_id }}" selected>{{ $kelurahan->subdis_name }}</option>
                                @else
                                    <option value="{{ $kelurahan->subdis_id }}">{{ $kelurahan->subdis_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') 
                    is-invalid @enderror" id="nomor_telepon" placeholder="Nomor Telepon Pasien" 
                    onkeypress="return event.charCode >= 48 && event.charCode <=57"
                    maxlength="12" required value="{{ old('nomor_telepon', $pasien->nomor_telepon) }}" readonly>
                    @error('nomor_telepon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="pendidikan">Pendidikan</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="pendidikan" class="form-control @error('pendidikan') 
                    is-invalid @enderror" id="pendidikan" required value="{{ old('pendidikan', $pasien->pendidikan) }}" readonly>
                        <select class="custom-select theSelect" disabled="true">
                            <option selected>Pilihan...</option>
                            <option value="tidak sekolah"<?php if ($pasien->pendidikan == "tidak sekolah") { echo 'selected';} ?>>Tidak Sekolah</option>
                            <option value="SD"<?php if ($pasien->pendidikan == "SD") { echo 'selected';} ?>>SD</option>
                            <option value="SLTP"<?php if ($pasien->pendidikan == "SLTP") { echo 'selected';} ?>>SLTP Sederajat</option>
                            <option value="SLTA"<?php if ($pasien->pendidikan == "SLTA") { echo 'selected';} ?>>SLTA Sederajat</option>
                            <option value="D1 - D3"<?php if ($pasien->pendidikan == "D1 - D3") { echo 'selected';} ?>>D1 - D3 Sederajat</option>
                            <option value="D4"<?php if ($pasien->pendidikan == "D4") { echo 'selected';} ?>>D4</option>
                            <option value="S1"<?php if ($pasien->pendidikan == "S1") { echo 'selected';} ?>>S1</option>
                            <option value="S2" <?php if ($pasien->pendidikan == "S2") { echo 'selected';} ?>>S2</option>
                            <option value="S3"<?php if ($pasien->pendidikan == "S3") { echo 'selected';} ?>>S3</option>
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="pekerjaan">Pekerjaan</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="pekerjaan" class="form-control @error('pekerjaan') 
                    is-invalid @enderror" id="pekerjaan" required value="{{ old('pekerjaan', $pasien->pekerjaan) }}" readonly>
                        <select class="custom-select theSelect" disabled="true">
                            <option selected>Pilihan...</option>
                            <option value="tidak bekerja"<?php if ($pasien->pekerjaan == "tidak bekerja") { echo 'selected';} ?>>Tidak Bekerja</option>
                            <option value="PNS"<?php if ($pasien->pekerjaan == "PNS") { echo 'selected';} ?>>PNS</option>
                            <option value="TNI/PORLI"<?php if ($pasien->pekerjaan == "TNI/PORLI") { echo 'selected';} ?>>TNI/PORLI</option>
                            <option value="BUMN"<?php if ($pasien->pekerjaan == "BUMN") { echo 'selected';} ?>>BUMN</option>
                            <option value="pegawai swasta / wirausaha"<?php if ($pasien->pekerjaan == "pegawai swasta / wirausaha") { echo 'selected';} ?>>pegawai swasta / wirausaha</option>
                            <option value="lain-lain"<?php if ($pasien->pekerjaan == "lain-lain") { echo 'selected';} ?>>Lain - lain</option>
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="status_pernikahan">Status Pernikahan</label>
                    <div class="input-group mb-3">
                    <input type="hidden" name="status_pernikahan" class="form-control @error('status_pernikahan') 
                    is-invalid @enderror" id="status_pernikahan" required value="{{ old('status_pernikahan', $pasien->status_pernikahan) }}" readonly>
                        <select class="custom-select theSelect" disabled="true">
                            <option selected>Pilihan...</option>
                            <option value="belum kawin"<?php if ($pasien->status_pernikahan == "belum kawin") { echo 'selected';} ?>>Belum Kawin</option>
                            <option value="kawin"<?php if ($pasien->status_pernikahan == "kawin") { echo 'selected';} ?>>Kawin</option>
                            <option value="cerai hidup"<?php if ($pasien->status_pernikahan == "cerai hidup") { echo 'selected';} ?>>Cerai Hidup</option>
                            <option value="cerai mati"<?php if ($pasien->status_pernikahan == "cerai_mati") { echo 'selected';} ?>>cerai Mati</option>
                        </select>
                    </div>
                </div>
                <div class="form-floating">
                    <label for="id_dokter">Dokter</label>
                    <div class="input-group mb-3">
                        <select class="custom-select theSelect" id="id_dokter" name="id_dokter" required>
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
                <div class="form-floating">
                    <label for="id_poliklinik">Poliklinik</label>
                    <div class="input-group mb-3">
                        <select class="custom-select theSelect" id="id_poliklinik" name="id_poliklinik" required>
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
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Selanjutnya</button>
                    <a class="w-100 btn btn-lg btn-primary mt-3" href="/pendaftaran">Kembali</a>
            </form>
        </main>
    </div>
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
