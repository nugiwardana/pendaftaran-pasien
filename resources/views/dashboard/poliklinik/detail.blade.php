@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">Detail Data Poliklinik</h1>

                <a href="/dashboard/poliklinik" class="btn btn-success"><span data-feather="arrow-left"></span> Back to data poliklinik</a>
                <a href="/dashboard/poliklinik/{{ $poliklinik->id_poliklinik }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/poliklinik/{{ $poliklinik->id_poliklinik }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    <span data-feather="x-circle"></span> Delete</button>
                </form>
                <div class="card mt-3">
                    <div class="card-body">
                        <table class="table table-striped table-condensed">
                            <tr>
                                <th width="20%">Nama Poliklinik : </th>
                                <td width="20%">{{ $poliklinik->nama_poliklinik }}</td>
                            </tr>
                            <tr>
                                <th width="20%">Keterangan : </th>
                                <td width="20%">{{ $poliklinik->keterangan }}</td>
                            </tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection