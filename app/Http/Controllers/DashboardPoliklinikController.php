<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use Illuminate\Http\Request;

class DashboardPoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.poliklinik.index', [
            'poliklinik' => Poliklinik::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.poliklinik.tambah');
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
            'nama_poliklinik' => 'required|max:255',
            'keterangan' => 'required',
        ]);

        Poliklinik::create($validatedData);

        return redirect('/dashboard/poliklinik')->with('success', 'Data Poliklinik Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function show(Poliklinik $poliklinik)
    {
        return view('dashboard.poliklinik.detail', [
            'poliklinik' => $poliklinik
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function edit(Poliklinik $poliklinik)
    {
        return view('dashboard.poliklinik.ubah', [
            'poliklinik' => $poliklinik,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poliklinik $poliklinik)
    {
        $rules = [
            'nama_poliklinik' => 'required|max:255',
            'keterangan' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Poliklinik::where('id_poliklinik', $poliklinik->id_poliklinik)
            ->update($validatedData);

        return redirect('/dashboard/poliklinik')->with('success', 'Data Poliklinik Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poliklinik $poliklinik)
    {
        Poliklinik::destroy($poliklinik->id_poliklinik);
        return redirect('/dashboard/poliklinik')->with('success', 'Data Poliklinik Berhasil Dihapus!');
    }
}
