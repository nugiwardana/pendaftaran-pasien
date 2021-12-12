@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">Detail Data Pendaftaran Pasien</h1>

                <a href="/dashboard/pasien" class="btn btn-success"><span data-feather="arrow-left"></span> Back to data pendaftaran pasien</a>
                <a href="/dashboard/pasien/{{ $pasien->id_pasien }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/pasien/{{ $pasien->id_pasien }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    <span data-feather="x-circle"></span> Delete</button>
                </form>
                <div class="card mt-3">
                    <div class="card-body">
                        <table class="table table-striped table-condensed">
                            <tr>
                                <th width="20%">Nama Lengkap : </th>
                                <td width="20%">{{ $pasien->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Nomor Rekam Medis : </th>
                                <td width="20%">{{ $pasien->no_rekam_medis }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Nomor Induk Kependudukan (NIK) : </th>
                                <td width="20%">{{ $pasien->nik }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Tempat Lahir : </th>
                                <td width="20%">{{ $pasien->tmpt_lahir }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Tanggal Lahir : </th>
                                <td width="20%"><?php
                                        $tanggal = explode('-', $pasien->tgl_lahir);
                                        echo $tanggal[2] . '/' . $tanggal[1] . '/' . $tanggal[0];
                                        ?></td>
                            </tr>
                            <tr>
                                <th width="20%">Usia : </th>
                                <td width="20%">{{ $pasien->usia }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Jenis Kelamin : </th>
                                <td width="20%">{{ $pasien->jk_pasien }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Agama : </th>
                                <td width="20%">{{ $pasien->agama }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Alamat : </th>
                                <td width="20%">{{ $pasien->alamat }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Provinsi : </th>
                                <td width="20%">{{ $pasien->prov_name }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Kabupaten / Kota : </th>
                                <td width="20%">{{ $pasien->city_name }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Kelurahan / Desa : </th>
                                <td width="20%">{{ $pasien->dis_name }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Kecamatan : </th>
                                <td width="20%">{{ $pasien->subdis_name }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Nomor Telepon Pasien : </th>
                                <td width="20%">{{ $pasien->nomor_pasien }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Pendidikan : </th>
                                <td width="20%">{{ $pasien->pendidikan }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Pekerjaan : </th>
                                <td width="20%">{{ $pasien->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Status Pernikahan : </th>
                                <td width="20%">{{ $pasien->status_pernikahan }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Dokter : </th>
                                <td width="20%">{{ $pasien->nama_dokter }} | {{ $pasien->spesialis }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Poliklinik : </th>
                                <td width="20%">{{ $pasien->nama_poliklinik }}</td>
                            </tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection