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

    public function simpangambar($data, $name)
    {
        $img = str_replace('data:image/png;base64,', '', $data);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
        $filename = $name;
        $file = public_path('foto/absenkegiatan')."/".$filename;
        file_put_contents($file, $data);
        return $filename;
    }

    public function store(Request $request)
    {
       

        $name = "fasdes_".$request->waktuabsen.".png";
        $name1 = "kegiatan_".$request->waktuabsen.".png";
        $name2 = "pelatihan_".$request->waktuabsen.".png";
        $filename = $this->simpangambar($request->selfie, $name);
        $filename2 = $this->simpangambar($request->fotokegiatan, $name1);
        $filename3 = $this->simpangambar($request->fotopelatihan, $name2);
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
            'selfiekegiatan'=>$filename,
            'fotokegiatan' => $filename2,
            'fotopelatihan' => $filename3,
        ];
    
        $this->kegiatan->addData($data);
        return redirect()->route('dashboard');
    }
}
