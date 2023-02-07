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
        $id = Auth::user()->id;
        $name = "fasdes_".$request->waktuabsen.".png";
        $name1 = "kegiatan_".$request->waktuabsen.".png";
        $name2 = "pelatihan_".$request->waktuabsen.".png";
        $filename = $this->simpangambar($request->selfie, $name);
        $filename2 = $this->simpangambar($request->fotokegiatan, $name1);
        $filename3 = $this->simpangambar($request->fotopelatihan, $name2);

       

        if($request->jeniskegiatan == "kantor"){
           
            // radius lokasi

             $lokasi = $this->lokasi->detailData(Auth::user()->id);
             dd($lokasi);
                $longi = $request->lokasiabsen;
                $L = explode("," , $longi);
                $L2 = explode("," , $longi1);
                $latitude1 = $L[0];
                $longitude1= $L[1];
                $latitude1 = $L1[0];
                $longitude1= $L1[1];

                dd($latitude1);
                
            // $L2 = explode(",", )

                // $L = explode("," , $longi);
                // $L2 = explode("," , $latitude);
                // $latitude1 = $L[0];
                // $latitude2 = $L2[0];
                // $longitude1 = $L[1];
                // $longitude2 = $L2[1];
                //$jarak = 6371 * acos(cos(deg2rad($latitude2))*cos(deg2rad($latitude1))*cos(deg2rad($longitude1)-deg2rad($longitude2))+sin(deg2rad($latitude2))*sin(deg2rad($latitude1)));





                // $theta = $longitude1 - $longitude2; 
                //     $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
                //     $distance = acos($distance); 
                //     $distance = rad2deg($distance); 
                //     $distance = $distance * 60 * 1.1515;  
                //     $distance = $distance * 1.609344; 
                //     $jarak = (round($distance,3)); 


        }else{
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
}
