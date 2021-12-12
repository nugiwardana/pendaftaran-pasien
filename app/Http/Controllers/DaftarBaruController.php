<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\Pasien;
use App\Models\Wilayah;
use App\Models\Provinces;
use App\Models\Subdistricts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Dokter;
use App\Models\Poliklinik;
use DateTime;
use Illuminate\Support\Facades\DB;

class DaftarBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daftar.daftar_baru',[
            'title' => 'Form Pendaftaran',
            'active' => 'pendaftaran',
            'provinsi' => Provinces::orderBy('prov_name', 'ASC')->get(),
            'kabupaten' => Cities::orderBy('city_name', 'ASC')->get(),
            'kecamatan' => Districts::orderBy('dis_name', 'ASC')->get(),
            'kelurahan' => Subdistricts::orderBy('subdis_name', 'ASC')->get(),
            'dokter' => Dokter::orderBy('nama_dokter', 'ASC')->get(),
            'poliklinik' => Poliklinik::orderBy('nama_poliklinik', 'ASC')->get(),
            // 'wilayah' => Wilayah::with('get_permissions')->whereRaw('LENGTH(kode)', 2)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_lengkap' => 'required|max:255',
            // 'no_rekam_medis' => 'max:6',
            'nik' => 'max:16|unique:pasien',
            'tmpt_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|max:255',
            // 'usia' => 'required',
            'jk' => 'required|max:255',
            'agama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kode_provinsi' => 'required|max:255',
            'kode_kabupaten' => 'required|max:255',
            'kode_kelurahan' => 'required|max:255',
            'kode_kecamatan' => 'required|max:255',
            'nomor_telepon' => 'required',
            'pendidikan' => 'required|max:255',
            'pekerjaan' => 'required|max:255',
            'status_pernikahan' => 'required|max:255',
            'id_dokter' => 'required|max:255',
            'id_poliklinik' => 'required|max:255',
        ]);

        if ($request->nik == null) {
            $validatedData['nik'] = "9999999999999999";
        }
        
        $data = DB::table('pasien')->count();
        if ($data == null) {
            $data = 0;
        }

        $hasil = $data + 1;
        $nomor = sprintf("%04s", $hasil);
        $tanggal = date('Ymd');
        $validatedData['no_rekam_medis'] = "$tanggal$nomor";

        $tanggal_lahir = new DateTime($request->tgl_lahir);
        $today = new DateTime('today');
        $y = $today->diff($tanggal_lahir)->y;
        $validatedData['usia'] = $y;
        
        Pasien::create($validatedData);

        return redirect('/')->with('success', 'Daftar pasein berhasil didaftarkan!');

        // dd('data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        //
    }
}
