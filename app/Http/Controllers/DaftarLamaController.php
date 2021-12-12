<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\Pasien;
use App\Models\Wilayah;
use App\Models\Provinces;
use App\Models\Subdistricts;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Dokter;
use App\Models\Poliklinik;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DaftarLamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daftar.konfirmasi2',[
            'title' => 'Pendaftaran',
            'active' => 'pendaftaran'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Pasien $pasien)
    {
        $nik = $request->nik;
        $user = Pasien::where('nik', $nik)->count();
        if ($user == 0) {
            return redirect('/daftar_lama')->with('error', 'Maaf NIK yang dimasukkan tidak ada, silahkan untuk mendaftarakan yang baru!');
        }
        
        return view('daftar.daftar_lama',[
            'title' => 'Pendaftaran',
            'active' => 'pendaftaran',
            'provinsi' => Provinces::orderBy('prov_name', 'ASC')->get(),
            'kabupaten' => Cities::orderBy('city_name', 'ASC')->get(),
            'kecamatan' => Districts::orderBy('dis_name', 'ASC')->get(),
            'kelurahan' => Subdistricts::orderBy('subdis_name', 'ASC')->get(),
            'dokter' => Dokter::orderBy('nama_dokter', 'ASC')->get(),
            'poliklinik' => Poliklinik::orderBy('nama_poliklinik', 'ASC')->get(),
            'pasien' => DB::table('pasien')->where('nik', $nik)->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pasien $pasien)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            // 'no_rekam_medis' => 'max:6',
            'nik' => 'required|max:16',
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

        // if ($request->nik != $pasien->nik) {
        //     $validatedData['nik'] = 'required|max:16|unique:pasien';
        // }

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
