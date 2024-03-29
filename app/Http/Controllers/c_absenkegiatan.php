<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenkegiatan;
use App\Models\lokasi;
use App\Models\fasdes;
use Storage;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
  
        date_default_timezone_set("Asia/Jakarta");
        $t = date("H:i");
        $z = str_replace(':', '-', $t);
        $id = Auth::user()->id;
        $name = "fasdes_".$id."-".$request->tanggalabsen."_".$z.".png";
        $name1 = "kegiatan_".$id."-".$request->tanggalabsen."_".$z.".png";
        $name2 = "pelatihan_".$id."-".$request->tanggalabsen."_".$z.".png";
        $filename = $this->simpangambar($request->selfie, $name);
        $filename2 = $this->simpangambar($request->fotokegiatan, $name1);
        $filename3 = $this->simpangambar($request->fotopelatihan, $name2);


        if($request->jeniskegiatan == "uptd"){
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
                
                if($jarak > 0.300 ){
                    alert()->error('Gagal', 'Jarak Anda terlalu Jauh')->iconHtml('<i class="fa fa-times"></i>');
                    return redirect()->back();
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
                        'verifikasi' => "Verified",
                    ];
                    $this->kegiatan->addData($data);
                    alert()->success('Berhasil', 'Absen Kegiatan Berhasil')->iconHtml('<i class="far fa-thumbs-up"></i>');
                    return redirect()->route('fasdes.dashboard')->with(['success' => Auth::user()->name. " Telah Melakukan Absen Kegiatan. Selamat bekerja"]);
                } 
        }
        elseif($request->jeniskegiatan == "dinas"){
                // radius lokasi
                 $lokasi = "-6.553692,107.762491";
                 $longi1 = $lokasi;
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
                    
                    if($jarak > 0.300 ){
                        alert()->error('Gagal', 'Jarak Anda terlalu Jauh')->iconHtml('<i class="fa fa-times"></i>');
                        return redirect()->back();
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
                            'verifikasi' => "Verified",
                        ];
                        $this->kegiatan->addData($data);
                        alert()->success('Berhasil', 'Absen Kegiatan Berhasil')->iconHtml('<i class="far fa-thumbs-up"></i>');
                        return redirect()->route('fasdes.dashboard')->with(['success' => Auth::user()->name. " Telah Melakukan Absen Kegiatan. Selamat bekerja"]);
                    } 
        }
        else{
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
                'verifikasi' => "Verified",
            ];
        
            $this->kegiatan->addData($data);
            alert()->success('Berhasil', 'Absen Kegiatan Berhasil')->iconHtml('<i class="far fa-thumbs-up"></i>');
            return redirect()->route('fasdes.dashboard');
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
                 'fasdes'=>$this->fasdes->tested($id),
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
        $awal = $request->awal;
        $akhir = $request->akhir;
        if($awal && $akhir == null){
            $awal = date("Y-m-01");
            $akhir =date("Y-m-31");
        }

        if($filter == null){
            $data = ['kegiatan' => $this->kegiatan->filterWaktu($id, $awal, $akhir),
            'fasdes'=>$this->fasdes->tested($id),
            'id'=>$id,
            'filter'=>$filter,
            'awal' => $awal,
            'akhir'=>$akhir,
           ];
       
        }
        elseif($awal == null OR $akhir == null){
            $data = ['kegiatan' => $this->kegiatan->filterKegiatan($id, $filter),
            'fasdes'=>$this->fasdes->tested($id),
            'id'=>$id,
            'filter'=>$filter,
            'awal' => $awal,
            'akhir'=>$akhir,
           ];
        }elseif($awal <> null AND $akhir <> null AND $filter <> null){
            $data = ['kegiatan' => $this->kegiatan->filterKegiatanWaktu($id, $filter, $awal, $akhir),
            'fasdes'=>$this->fasdes->tested($id),
            'id'=>$id,
            'filter'=>$filter,
            'awal' => $awal,
            'akhir'=>$akhir,
           ];
        }
        else{
            $data = ['kegiatan' => $this->kegiatan->absenKegiatan($id, $t),
                 'fasdes'=>$this->fasdes->tested($id),
                 'id'=>$id,
                 'awal' => $awal,
                 'akhir'=>$akhir,
                  'filter'=>"Semua Kegiatan",
                ];
        }
       
        return view('absensi.kegiatan.kegiatan', $data);
    }

    public function detailAbsen($id)
    {
        $data = [
                 'absen'=>$this->kegiatan->joinData($id),];
        return view('absensi.kegiatan.detail', $data);
    }

    public function editAbsen($id)
    {
        $data = ['kegiatan' => $this->kegiatan->detailData($id),
                  ];
        return view('absensi.kegiatan.edit', $data);
    }

    public function export($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $t = date("Y-m");
        $data = ['kegiatan' => $this->kegiatan->absenKegiatan($id, $t),
                 'fasdes'=>$this->fasdes->tested($id),
                ];
       return view('absensi.kegiatan.export', $data);
    } 
    public function export2(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $t = date("Y-m");
        $filter = $request->filter;
        $awal = $request->awal;
        $akhir = $request->akhir;
        $id = $request->id;
        if($awal && $akhir == null){
            $awal = date("Y-m-01");
            $akhir =date("Y-m-31");
        }

        if($filter == null){
            $data = ['kegiatan' => $this->kegiatan->filterWaktu($id, $awal, $akhir),
            'fasdes'=>$this->fasdes->detailData($id),
            'id'=>$id,
            'filter'=>$filter,
            'awal' => $awal,
            'akhir'=>$akhir,
           ];
       
        }
        elseif($awal == null OR $akhir == null){
            $data = ['kegiatan' => $this->kegiatan->filterKegiatan($id, $filter),
            'fasdes'=>$this->fasdes->detailData($id),
            'id'=>$id,
            'filter'=>$filter,
            'awal' => $awal,
            'akhir'=>$akhir,
           ];
        }elseif($awal <> null AND $akhir <> null AND $filter <> null){
            $data = ['kegiatan' => $this->kegiatan->filterKegiatanWaktu($id, $filter, $awal, $akhir),
            'fasdes'=>$this->fasdes->detailData($id),
            'id'=>$id,
            'filter'=>$filter,
            'awal' => $awal,
            'akhir'=>$akhir,
           ];
        }
        else{
            $data = ['kegiatan' => $this->kegiatan->absenKegiatan($id, $t),
                 'fasdes'=>$this->fasdes->detailData($id),
                 'id'=>$id,
                 'awal' => $awal,
                 'akhir'=>$akhir,
                  'filter'=>"Semua Kegiatan",
                ];
        }
       return view('absensi.kegiatan.export', $data);
    } 
    
    public function updateAbsen(Request $request, $id)
    {
        $data = [
            'jeniskegiatan' => $request->jeniskegiatan,
            'deskripsikegiatan' => $request->deskripsikegiatan,
            'pelatihan' => $request->pelatihan,
            'judulpelatihan' => $request->judulpelatihan,
            'durasipelatihan' => $request->durasipelatihan,
            'tempatpelatihan' => $request->tempatpelatihan,
        ];
      

        // Ganti Foto
        $namafoto = $this->kegiatan->detailData($id);
     
         // foto selfie
        if($request->selfiekegiatan <> null){
            $file = $request->selfiekegiatan;
            $filename = $namafoto->selfiekegiatan;
            $file->move(public_path('foto/absenkegiatan'),$filename);
            $data['selfiekegiatan'] = $filename;
        }

        // foto kegiatan
        if($request->fotokegiatan <> null){
            $file2 = $request->fotokegiatan;
            $filename2 = $namafoto->fotokegiatan;
            $file2->move(public_path('foto/absenkegiatan'),$filename2);
            $data['fotokegiatan'] = $filename2;
        }

         // foto pelatihan
         if($request->fotopelatihan <> null){
            $file3 = $request->fotopelatihan;
            $filename3 = $namafoto->fotopelatihan;
            $file3->move(public_path('foto/absenkegiatan'),$filename3);
            $data['fotopelatihan'] = $filename3;
        }

        $this->kegiatan->editData($id, $data);
        $data = $this->kegiatan->detailData($id);
        return redirect()->route('kegiatan.kegiatan', $data->id_user);
    }

    public function verifiedAbsen($id)
    {
        $data = [
            'verifikasi' => "Verified",
        ];
        $data = $this->kegiatan->editData($id, $data);
        $data1 = $this->kegiatan->detailData($id);
        return redirect()->route('kegiatan.kegiatan', $data1->id_user)->with('success', 'Absensi Kegiatan Verified.');
    }

    public function declineAbsen($id)
    {
        $data = [
            'verifikasi' => "Decline",
        ];
        $data = $this->kegiatan->editData($id, $data);
        $data1 = $this->kegiatan->detailData($id);
        return redirect()->route('kegiatan.kegiatan', $data1->id_user)->with('success', 'Absensi Kegiatan Decline.');
    }


    // End halaman Admin
}
