<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenkegiatan;
use App\Models\lokasi;
use App\Models\fasdes;
use Storage;
use Auth;

class c_absenkegiatan extends Controller
{
    // Halaman User
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->kegiatan = new absenkegiatan();
        $this->fasdes = new fasdes();
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
        $name = "fasdes_".$request->tanggalabsen.".png";
        $name1 = "kegiatan_".$request->tanggalabsen.".png";
        $name2 = "pelatihan_".$request->tanggalabsen.".png";
        $filename = $this->simpangambar($request->selfie, $name);
        $filename2 = $this->simpangambar($request->fotokegiatan, $name1);
        $filename3 = $this->simpangambar($request->fotopelatihan, $name2);

       

        if($request->jeniskegiatan == "kantor"){
           

         
            // radius lokasi

             $lokasi = $this->lokasi->detailData2(Auth::user()->id);
             $longi1 = $lokasi->lokasi;
             $longi = $request->lokasiabsen;

                $L = explode("," , $longi);
                $L2 = explode("," , $longi1);
                $latitude1 = $L[0];
                $longitude1= $L[1];
                $latitude2 = $L2[0];
                $longitude2= $L2[1];
                $theta = $longitude1 - $longitude2; 
                $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
                $distance = acos($distance); 
                $distance = rad2deg($distance); 
                $distance = $distance * 60 * 1.1515;  
                $distance = $distance * 1.609344; 
                $jarak = (round($distance,3)); 
                
                if($jarak > 0.200 ){
                    return redirect()->back()->with('msg', 'Jarak terlalu jauh');
                }
                else{
                    date_default_timezone_set("Asia/Jakarta");
                    $t = date("H:i");
                    $data = [
                        'id_user' => Auth::user()->id,
                        'tanggalabsen'=>$request->tanggalabsen,
                        'waktuabsen'=>$t,
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
                    return redirect('dashboard')->with('msg', 'absen berhasil');
                } 
        }else{
            date_default_timezone_set("Asia/Jakarta");
            $t = date("H:i");
            $data = [
                'id_user' => Auth::user()->id,
                'waktuabsen'=>$t,
                'tanggalabsen'=>$request->tanggalabsen,
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
    // End Halaman User

    // Start Halaman Admin
    public function index2(){
        $data = ['fasdes' => $this->fasdes->allData(),];
        return view('absensi.kegiatan.index', $data);
    }

    public function kegiatan($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $t = date("Y-m");
        $data = ['kegiatan' => $this->kegiatan->absenKegiatan($id, $t),
                 'fasdes'=>$this->fasdes->detailData($id),
                 'id'=>$id,
                 'filter'=>"Semua Kegiatan",
                ];
            
        return view('absensi.kegiatan.kegiatan', $data);
    }

 
    public function filterKegiatan(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $t = date("Y-m");
        $filter = $request->filter;
        if($filter <> "all"){
            $data = ['kegiatan' => $this->kegiatan->filterKegiatan($id, $filter),
            'fasdes'=>$this->fasdes->detailData($id),
            'id'=>$id,
            'filter'=>$filter,
           ];
       
        }else{
            $data = ['kegiatan' => $this->kegiatan->absenKegiatan($id, $t),
                 'fasdes'=>$this->fasdes->detailData($id),
                 'id'=>$id,
                  'filter'=>"Semua Kegiatan",
                ];
        }
       
        return view('absensi.kegiatan.kegiatan', $data);
    }

    public function editAbsen($id)
    {
        $data = ['kegiatan' => $this->kegiatan->detailData($id),];
        return view('absensi.kegiatan.edit', $data);
    }


    public function updateAbsen(Request $request, $id)
    {
        $data = [
            'tanggalabsen' => $request->tanggalabsen,
            'waktuabsen' => $request->waktuabsen,
        ];
        $this->kegiatan->editData($id, $data);
        return view('dashboard');
    }
    // End halaman Admin
}
