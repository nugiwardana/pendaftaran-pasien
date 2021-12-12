@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">Detail Data Dokter</h1>

                <a href="/dashboard/dokter" class="btn btn-success"><span data-feather="arrow-left"></span> Back to data dokter</a>
                <a href="/dashboard/dokter/{{ $dokter->id_dokter }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/dokter/{{ $dokter->id_dokter }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    <span data-feather="x-circle"></span> Delete</button>
                </form>
                <div class="card mt-3">
                    <div class="card-body">
                        <table class="table table-striped table-condensed">
                            <tr>
                                <th width="20%">Nomor Induk Pegawai (NIP) : </th>
                                <td width="20%">{{ $dokter->nip }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Nama Dokter : </th>
                                <td width="20%">{{ $dokter->nama_dokter }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Jenis Kelamin : </th>
                                <td width="20%">{{ $dokter->jk }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Spesialis : </th>
                                <td width="20%">{{ $dokter->spesialis }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Poliklinik : </th>
                                <td width="20%">{{ $dokter->nama_poliklinik }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Nomor Telepon : </th>
                                <td width="20%">{{ $dokter->nomor_telepon }}</td>
                            </tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection