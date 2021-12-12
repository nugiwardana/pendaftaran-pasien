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

class KonfirmasiController extends Controller
{
    public function index()
    {
        return view('daftar.konfirmasi',[
            'title' => 'Pendaftaran',
            'active' => 'pendaftaran'
        ]);
    }

    public function store(Request $request)
    {
        $konfirmasi = $request->konfirmasi;

        if ($konfirmasi == "ya") {
            return redirect('/daftar_lama');
        } else {
            return redirect('/daftar');
        }
    }
}
