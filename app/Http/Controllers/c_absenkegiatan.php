<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenkegiatan;
use App\Models\lokasi;
use Storage;
use Auth;

class c_absenkegiatan extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->kegiatan = new absenkegiatan();
    }

    public function index()
    {
        return view('user.absen.kegiatan');
    }

    public function store(Request $request)
    {
        $img = $request->image;
        $folderPath = "kegiatan/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        
        $data = [
            'id_user' => Auth::user()->id,
            'waktuabsen'=>$request->waktuabsen,
            'lokasiabsen'=>$request->lokasiabsen,
            'jeniskegiatan'=> $request->jeniskegiatan,
            'deskripsikegiatan' => $request->deskripsikegiatan,
            'pelatihan' => $request->pelatihan,
            'judulpelatihan' => $request->judulpelatihan,
            'durasipelatihan' => $request->durasipelatihan,
            'tempatpelatihan' => $request->tempatpelatihan,
            'selfiekegiatan'=>$fileName,
            // 'selfiekegiatan'=> $request->selfiekegiatan,
            // 'fotokegiatan' => $fotokegiatan,
            // 'fotopelatihan' => $fotopelatihan,
        ];
        $this->kegiatan->addData($data);
        return redirect()->route('dashboard');
    }
}
