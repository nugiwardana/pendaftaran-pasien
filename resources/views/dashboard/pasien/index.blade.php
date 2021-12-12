@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Pendaftaraan Pasien</h1>
</div>
@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
    <a href="/dashboard/pasien/create" class="btn btn-primary mb-3">Tambah daftar pasien</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">No Rekam Medis</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Poliklinik</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $pasien)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pasien->nama_lengkap }}</td>
                <td>{{ $pasien->no_rekam_medis }}</td>
                <td>{{ $pasien->nama_dokter }}</td>
                <td>{{ $pasien->nama_poliklinik }}</td>
                <td>
                    <a href="/dashboard/pasien/{{ $pasien->id_pasien }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/pasien/{{ $pasien->id_pasien }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/pasien/{{ $pasien->id_pasien }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection