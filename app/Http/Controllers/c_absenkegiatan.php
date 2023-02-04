<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenkegiatan;
use App\Models\lokasi;
use Auth;

class c_absenkegiatan extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->kegiatan = new absenkegiatan();
    }

    public function store(Request $request)
    {
        $data = [
            'id_user' => Auth::user()->id,
            'waktuabsen'=>$request->waktuabsen,
            'lokasiabsen'=>$request->lokasiabsen,
            'jeniskegiatan'=> $request->jeniskegiatan,
            'deskripsikegiatan' => $request->deskripsikegiatan,
            // 'selfiekegiatan'=> $request->selfiekegiatan,
            // 'fotokegiatan' => $fotokegiatan,
            'pelatihan' => $request->pelatihan,
            // 'fotopelatihan' => $fotopelatihan,
            'judulpelatihan' => $request->judulpelatihan,
            'durasipelatihan' => $request->durasipelatihan,
            'tempatpelatihan' => $request->tempatpelatihan,
        ];
        dd($data);
        $this->kegiatan->addData($data);
        return redirect()->route('absen.kegiatan');
    }
}
