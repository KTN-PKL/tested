<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenharian;
use App\Models\fasdes;
use App\Models\lokasi;
use Auth;

class c_absenharian extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->harian = new absenharian();
        $this->fasdes = new fasdes();
    }
    public function index()
    {
        $data = ['fasdes' => $this->fasdes->allData()];
        return view('absenharian.index', $data);
    }
    public function create()
    {
        date_default_timezone_set("Asia/Jakarta");
          $t = date("Y-m-d");
          $d = date("D");
          $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
            );
        $cek = $dayList[$d].", ".$t;
        $data = ['cek'=> $this->harian->cek(Auth::user()->id, $cek),];
        return view('user.absen.harian', $data);
    }

    public function simpangambar($data, $name)
    {
        $img = str_replace('data:image/png;base64,', '', $data);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
        $filename = $name;
        $file = public_path('foto')."/".$filename;
        file_put_contents($file, $data);
        return $filename;
    }
    public function jarak($data)
    {
        $lokasi = $this->lokasi->detailData2(Auth::user()->id);
        $L = explode("," , $lokasi->lokasi);
        $L2 = explode("," , $data);
        $latitude1 = $L[0];
        $latitude2 = $L2[0];
        $longitude1 = $L[1];
        $longitude2 = $L2[1];
        $theta = $longitude1 - $longitude2; 
	    $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
	    $distance = acos($distance); 
	    $distance = rad2deg($distance); 
	    $distance = $distance * 60 * 1.1515;  
	    $distance = $distance * 1.609344; 
	    $jarak = (round($distance,3)); 
        return $jarak;
    }
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $t = date("H:i");
        $name = "fasdes_masuk_".$request->harian.".png";
        $name1 = "kegiatan_masuk_".$request->harian.".png";
        $filename = $this->simpangambar($request->selfie, $name);
        $filename1 = $this->simpangambar($request->kegiatan, $name1);
        $data = [
            'id_user' => Auth::user()->id,
            'lokasiharian' => $request->lokasi,
            'fotofasdes' => $filename,
            'deskripsi' => $request->deskripsi,
            'fotokegiatanharian' => $filename1,
            'tgl' => $request->harian,
            'jam' => $t,
        ];
        $this->harian->addData($data);
        return redirect()->route('absen.harian');
    }
    public function storepulang(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $t = date("H:i");
        $name = "fasdes_pulang_".$request->harian.".png";
        $name1 = "kegiatan_pulang_".$request->harian.".png";
        $filename = $this->simpangambar($request->selfie, $name);
        $filename1 = $this->simpangambar($request->kegiatan, $name1);
        $data = [
            'lokasipulang' => $request->lokasi,
            'fotofasdespulang' => $filename,
            'deskripsipulang' => $request->deskripsi,
            'fotokegiatanharianpulang' => $filename1,
            'jampulang' => $t,
        ];
        $this->harian->editData(Auth::user()->id,$request->harian, $data);
        return redirect()->route('absen.harian');
    }
    public function masuk($id)
    {
        $data = ['harian' => $this->harian->allData($id, "masuk"),
                 'pulang' => $this->harian->allData($id, "pulang"),];
        return view('absenharian.absenharian', $data);
    }
    public function edit($id)
    {
        $data = [
            'kecamatan' => $this->kecamatan->allData(),
            'harian' => $this->harian->detailData($id),
        ];
        return view('harian.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'fotofasdes' => $filename,
            'deskripsi' => $request->deskripsi,
            'fotokegiatanharian' => $filename1,
        ];
        $this->harian->editData($id, $data);
        return redirect()->route('faskab.harian.index');
    }
    public function destroy($id)
    {
        $this->harian->deleteData($id);
        return redirect()->route('faskab.harian.index');
    }
}
