<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dokter.index', [
            'dokter' => Dokter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dokter.tambah',[
            'poliklinik' => Poliklinik::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|unique:dokter|max:255',
            'nama_dokter' => 'required|max:255',
            'jk' => 'required',
            'spesialis' => 'required|max:255',
            'id_poliklinik' => 'required',
            'nomor_telepon' => 'required',
        ]);

        Dokter::create($validatedData);

        return redirect('/dashboard/dokter')->with('success', 'Data Dokter Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        $id = $dokter->id_dokter;
        return view('dashboard.dokter.detail', [
            'dokter' => DB::table('dokter')
                        ->join('poliklinik', 'dokter.id_poliklinik', '=', 'poliklinik.id_poliklinik')
                        ->select('dokter.*','poliklinik.*')
                        ->where('dokter.id_dokter',$id)
                        ->first(),
            // 'dokter' => $dokter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('dashboard.dokter.ubah', [
            'dokter' => $dokter,
            'poliklinik' => Poliklinik::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $rules = [
            'nama_dokter' => 'required|max:255',
            'jk' => 'required',
            'spesialis' => 'required|max:255',
            'id_poliklinik' => 'required',
            'nomor_telepon' => 'required',
        ];

        if ($request->nip != $dokter->nip) {
            $rules['nip'] = 'required|unique:dokter';
        }

        $validatedData = $request->validate($rules);

        Dokter::where('id_dokter', $dokter->id_dokter)
            ->update($validatedData);

        return redirect('/dashboard/dokter')->with('success', 'Data Dokter Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        Dokter::destroy($dokter->id_dokter);
        return redirect('/dashboard/dokter')->with('success', 'Data Dokter Berhasil Dihapus!');
    }
}
