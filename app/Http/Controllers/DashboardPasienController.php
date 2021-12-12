<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\Pasien;
use App\Models\Wilayah;
use App\Models\Provinces;
use App\Models\Subdistricts;
use App\Models\Dokter;
use App\Models\Poliklinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class DashboardPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pasien.index', [
            // 'pasien' => Pasien::all(),
            'pasien' => DB::table('pasien')
                        ->join('provinces', 'pasien.kode_provinsi', '=', 'provinces.prov_id')
                        ->join('cities', 'pasien.kode_kabupaten', '=', 'cities.city_id')
                        ->join('districts', 'pasien.kode_kecamatan', '=', 'districts.dis_id')
                        ->join('subdistricts', 'pasien.kode_kelurahan', '=', 'subdistricts.subdis_id')
                        ->join('dokter', 'pasien.id_dokter', '=', 'dokter.id_dokter')
                        ->join('poliklinik', 'pasien.id_poliklinik', '=', 'poliklinik.id_poliklinik')
                        ->select('pasien.*','provinces.*','cities.*','districts.*','subdistricts.*','dokter.*','poliklinik.*')
                        ->orderBy('pasien.nama_lengkap', 'ASC')
                        ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pasien.tambah',[
            'provinsi' => Provinces::orderBy('prov_name', 'ASC')->get(),
            'kabupaten' => Cities::orderBy('city_name', 'ASC')->get(),
            'kecamatan' => Districts::orderBy('dis_name', 'ASC')->get(),
            'kelurahan' => Subdistricts::orderBy('subdis_name', 'ASC')->get(),
            'dokter' => Dokter::orderBy('nama_dokter', 'ASC')->get(),
            'poliklinik' => Poliklinik::orderBy('nama_poliklinik', 'ASC')->get(),
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

        return redirect('/dashboard/pasien')->with('success', 'Daftar pasein berhasil didaftarkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        $id = $pasien->id_pasien;
        return view('dashboard.pasien.tampil', [
            // 'pasien' => Pasien::all(),
            'pasien' => DB::table('pasien')
                        ->join('provinces', 'pasien.kode_provinsi', '=', 'provinces.prov_id')
                        ->join('cities', 'pasien.kode_kabupaten', '=', 'cities.city_id')
                        ->join('districts', 'pasien.kode_kecamatan', '=', 'districts.dis_id')
                        ->join('subdistricts', 'pasien.kode_kelurahan', '=', 'subdistricts.subdis_id')
                        ->join('dokter', 'pasien.id_dokter', '=', 'dokter.id_dokter')
                        ->join('poliklinik', 'pasien.id_poliklinik', '=', 'poliklinik.id_poliklinik')
                        ->select('pasien.*','pasien.jk as jk_pasien','pasien.nomor_telepon as nomor_pasien',
                        'provinces.*','cities.*','districts.*',
                        'subdistricts.*','dokter.*','poliklinik.*')
                        ->where('pasien.id_pasien',$id)
                        ->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        return view('dashboard.pasien.ubah', [
            'provinsi' => Provinces::orderBy('prov_name', 'ASC')->get(),
            'kabupaten' => Cities::orderBy('city_name', 'ASC')->get(),
            'kecamatan' => Districts::orderBy('dis_name', 'ASC')->get(),
            'kelurahan' => Subdistricts::orderBy('subdis_name', 'ASC')->get(),
            'dokter' => Dokter::orderBy('nama_dokter', 'ASC')->get(),
            'poliklinik' => Poliklinik::orderBy('nama_poliklinik', 'ASC')->get(),
            'pasien' => $pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $rules = [
            'nama_lengkap' => 'required|max:255',
            // 'no_rekam_medis' => 'max:6',
            'tmpt_lahir' => 'required|max:255',
            'tgl_lahir' => 'required|max:255',
            'usia' => 'required',
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
        ];

        if ($request->nik != $pasien->nik) {
            $rules['nik'] = 'required|max:16|unique:pasien';
        }

        if ($request->nik == null) {
            $rules['nik'] = "9999999999999999";
        }
        
        // $tgl_lhr = $request->tgl_lahir;
        // $tanggal_lahir = new DateTime($tgl_lhr);
        // $today = new DateTime('today');
        // $tahun = $today->diff($tanggal_lahir)->y;
        // $rules['usia'] = $tahun;
        

        // if ($request->usia != $pasien->usia) {
        //     $rules['usia'] = 'required';
        // }

        $validatedData = $request->validate($rules);

        Pasien::where('id_pasien', $pasien->id_pasien)
            ->update($validatedData);

        return redirect('/dashboard/pasien')->with('success', 'Data pendaftaran pasien Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id_pasien);
        return redirect('/dashboard/pasien')->with('success', 'Data Pasien Berhasil Dihapus!');
    }
}
