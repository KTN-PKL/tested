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
        //selfie
        $img = str_replace('data:image/png;base64,', '', $request->selfie);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
        $filename = uniqid() . '.png';
        $file = public_path('foto/absenkegiatan')."/".$filename;
        file_put_contents($file, $data);
        // endselfie

        // fotokegiatan
        $img2 = str_replace('data:image/png;base64,', '', $request->fotokegiatan);
	    $img2 = str_replace(' ', '+', $img2);
	    $data = base64_decode($img2);
        $filename2 = uniqid() . '.png';
        $file2 = public_path('foto/absenkegiatan')."/".$filename;
        file_put_contents($file2, $data);
        // end fotokegiatan

        // fotopelatihan
        $img3 = str_replace('data:image/png;base64,', '', $request->fotopelatihan);
        $img3 = str_replace(' ', '+', $img3);
        $data = base64_decode($img3);
        $filename3 = "pelatihan".uniqid() . '.png';
        $file3 = public_path('foto/absenkegiatan')."/".$filename;
        file_put_contents($file3, $data);
        // end fotokegiatan



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
