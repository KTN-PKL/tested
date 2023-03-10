<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenharian;
use App\Models\absenkegiatan;
use App\Models\fasdes;
use App\Models\lokasi;
use Auth;
// use PDF;

class c_absenharian extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->harian = new absenharian();
        $this->kegiatan = new absenkegiatan();
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
        $data = ['cek'=> $this->harian->cek(Auth::user()->id, $t),];
        return view('user.absen.harian', $data);
    }
    public function chart(Request $request)
    {
        $data1 = strtotime($request->dari);
        $bulan1 = date('m', $data1);
        $tahun1 = date('Y', $data1);
        $hari1 = date('d', $data1);
        $sampai = str_replace("/","",$request->sampai);
        $data2 = strtotime($sampai);
        $bulan2 = date('m', $data2);
        $tahun2 = date('Y', $data2);
        $hari2 = date('d', $data2);
        $a = 0;
        for ($tahun = $tahun1; $tahun <= $tahun2 ; $tahun++) { 
            
            for ($bulan = $bulan1; $bulan <= $bulan2; $bulan++) { 
                if ($bulan == $bulan1) {
                    $jh = $hari1;
                  } else {
                    $jh = 1;
                  }
                  if ($bulan == $bulan2) {
                    $hari = $hari2;
                  } else {
                    $kalender = CAL_GREGORIAN;
                    $hari = cal_days_in_month($kalender, $bulan, $tahun);
                  }
                for ($i = $jh; $i <= $hari; $i++) { 
                    $har=$i;
                    $cek2 = strlen($i);
                     if($cek2 <> 2)
                     {$har = "0".$i;}
                     $cek3 = strlen($bulan);
                     if($cek3 <> 2)
                    {$bulan = "0".$bulan;}
                    $h[$a] = $har."-".$bulan."-".$tahun;
                    $v[$a] = $this->harian->rh($tahun."-".$bulan."-".$har);
                    $p[$a] = $this->harian->rhp($tahun."-".$bulan."-".$har);
                    $k[$a] = $this->kegiatan->rk($tahun."-".$bulan."-".$har);
                    $a = $a+1;
                }
            }
        }
        $data = [
            'h' => $h,
            'v' => $v,
            'p' => $p,
            'k' => $k,
        ];
        return($data);
    }
    public function chart2(Request $request)
    {
        $data1 = strtotime($request->dari);
        $bulan1 = date('m', $data1);
        $tahun1 = date('Y', $data1);
        $hari1 = date('d', $data1);
        $sampai = str_replace("/","",$request->sampai);
        $data2 = strtotime($sampai);
        $bulan2 = date('m', $data2);
        $tahun2 = date('Y', $data2);
        $hari2 = date('d', $data2);
        $a = 0;
        for ($tahun = $tahun1; $tahun <= $tahun2 ; $tahun++) { 
            
            for ($bulan = $bulan1; $bulan <= $bulan2; $bulan++) { 
                if ($bulan == $bulan1) {
                    $jh = $hari1;
                  } else {
                    $jh = 1;
                  }
                  if ($bulan == $bulan2) {
                    $hari = $hari2;
                  } else {
                    $kalender = CAL_GREGORIAN;
                    $hari = cal_days_in_month($kalender, $bulan, $tahun);
                  }
                for ($i = $jh; $i <= $hari; $i++) { 
                    $har=$i;
                    $cek2 = strlen($i);
                     if($cek2 <> 2)
                     {$har = "0".$i;}
                     $cek3 = strlen($bulan);
                     if($cek3 <> 2)
                    {$bulan = "0".$bulan;}
                    $h[$a] = $har."-".$bulan."-".$tahun;
                    $v[$a] = $this->harian->rhu($tahun."-".$bulan."-".$har);
                    $p[$a] = $this->harian->rhpu($tahun."-".$bulan."-".$har);
                    $a = $a+1;
                }
            }
        }
        $data = [
            'h' => $h,
            'v' => $v,
            'p' => $p,
        ];
        return($data);
    }
    public function detail($id)
    {
        $data = ['harian' => $this->harian->detailData($id),
        'absen'=>$this->harian->joinData($id),];
        return view('absenharian.detail', $data);
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
    // Jarak UPTD 
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
    // jarak Dinas PErtanian
    public function jarak2($data)
    {
        $lokasi = "-6.553692,107.762491";
        $L = explode("," , $lokasi);
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
       
        if($request->jenis == "UPTD"){
            $jarak = $this->jarak($request->lokasi);
      
            if($jarak > 0.300)
            {
                alert()->error('Gagal', 'Jarak Anda terlalu Jauh')->iconHtml('<i class="fa fa-times"></i>');
                return redirect()->back();
            }
        }
        if($request->jenis == "Dinas"){
            $jarak = $this->jarak2($request->lokasi);
      
            if($jarak > 0.300)
            {
                alert()->error('Gagal', 'Jarak Anda terlalu Jauh')->iconHtml('<i class="fa fa-times"></i>');
                return redirect()->back();
            }
        }
       
        date_default_timezone_set("Asia/Jakarta");
        $t = date("H:i");
        $name = "fasdes_masuk_".$request->harian."_".Auth::user()->id.".png";
        $name1 = "kegiatan_masuk_".$request->harian."_".Auth::user()->id.".png";
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
            'jenis' => $request->jenis,
            'verifikasi' => "Verified",
        ];
        $this->harian->addData($data);

        alert()->success('Berhasil', 'Absen Harian Berhasil, Selamat Bekerja')->iconHtml('<i class="far fa-thumbs-up"></i>');
        return redirect()->route('absen.harian');
      
    }
    public function storepulang(Request $request)
    {
        if($request->jenis == "UPTD"){
            $jarak = $this->jarak($request->lokasi);
      
            if($jarak > 0.300)
            {
                alert()->error('Gagal', 'Jarak Anda terlalu Jauh')->iconHtml('<i class="fa fa-times"></i>');
                return redirect()->back();
            }
        }
        if($request->jenis == "Dinas"){
            $jarak = $this->jarak2($request->lokasi);
      
            if($jarak > 0.300)
            {
                alert()->error('Gagal', 'Jarak Anda terlalu Jauh')->iconHtml('<i class="fa fa-times"></i>');
                return redirect()->back();
            }
        }

        date_default_timezone_set("Asia/Jakarta");
        $t = date("H:i");
        $name = "fasdes_pulang_".$request->harian."_".Auth::user()->id.".png";
        $name1 = "kegiatan_pulang_".$request->harian."_".Auth::user()->id.".png";
        $filename = $this->simpangambar($request->selfie, $name);
        $filename1 = $this->simpangambar($request->kegiatan, $name1);
        $data = [
            'lokasipulang' => $request->lokasi,
            'fotofasdespulang' => $filename,
            'deskripsipulang' => $request->deskripsi,
            'fotokegiatanharianpulang' => $filename1,
            'jampulang' => $t,
            'jenispulang' => $request->jenis,
        ];
        $this->harian->editData(Auth::user()->id,$request->harian, $data);
        alert()->success('Berhasil', 'Absen Harian Sudah Selesai, Hati Hati Dijalan')->iconHtml('<i class="far fa-thumbs-up"></i>');
        return redirect()->route('absen.harian');
    }
    public function hari($id)
    {
        $data = strtotime($id);
        $kalender = CAL_GREGORIAN;
        $bulan = date('m', $data);
        $tahun = date('Y', $data);
        $hari = cal_days_in_month($kalender, $bulan, $tahun);
        return $hari;
    }
    public function read(Request $request)
    {
        $data = ['harian' => $this->harian->search($request->id, $request->dari, $request->sampai),
                 'jumlah' => $this->harian->jumlahData($request->id, $request->dari, $request->sampai),
                'dari' => $request->dari,
                'sampai' => $request->sampai,
                ];
        return view('absenharian.table', $data);
    }
    public function absen($id)
    {
        $data = ['id' => $id,
        'fasdes'=> $this->fasdes->tested($id)];

        return view('absenharian.absenharian', $data);
    }
    public function edit($id)
    {
        $data = [
            'harian' => $this->harian->detailData($id),
        ];
        return view('absenharian.edit', $data);
    }
    public function update(Request $request, $id)
    {
        if ($request->fasdes <> null)
        {
        $file  = $request->fasdes;
        $filename = "fasdes_".$request->jenis."_".$request->harian.".".$file->extension();
        $file->move(public_path('foto'),$filename);
        if ($request->jenis == "masuk")
        {
            $data = ['fotofasdes' => $filename,];
            $this->harian->editData2($id, $data);
        }
        else
        {
            $data = ['fotofasdespulang' => $filename,];
            $this->harian->editData2($id, $data);
        }
        }
        if ($request->kegiatan <> null)
        {
        $file1  = $request->kegiatan;
        $filename1 = "kegiatan_".$request->jenis."_".$request->harian.".".$file->extension();
        $file->move(public_path('foto'),$filename1);
        if ($request->jenis == "masuk")
        {
            $data = ['fotokegiatanharian' => $filename1,];
            $this->harian->editData2($id, $data);
        }
        else
        {
            $data = ['fotokegiatanharianpulang' => $filename1,];
            $this->harian->editData2($id, $data);
        }
        }
        if ($request->jenis == "masuk")
        {
            $data = ['deskripsi' => $request->deskripsi,];
            $this->harian->editData2($id, $data);
        }
        else
        {
            $data = ['deskripsipulang' => $request->deskripsi,];
            $this->harian->editData2($id, $data);
        }
      
        return redirect()->route('faskab.harian.index');
        
    }
    public function export(Request $request)
    {
        $data = ['harian' => $this->harian->search($request->id, $request->dari, $request->sampai),
                 'jumlah' => $this->harian->jumlahData($request->id, $request->dari, $request->sampai),
                 'fasdes'=>$this->fasdes->tested($request->id),
                'dari' => $request->dari,
                'sampai' => $request->sampai];
          
       return view('absenharian.export', $data);
    }
    public function destroy($id)
    {
        $this->harian->deleteData($id);
        return redirect()->route('faskab.harian.index');
    }

    public function verifiedAbsen($id)
    {
        $data = [
            'verifikasi' => "Verified",
        ];
        $data = $this->harian->editData2($id, $data);
        $data1 = $this->harian->detailData($id);
        return redirect()->route('faskab.harian.absen', $data1->id_user)->with('success', 'Absensi Harian Verified.');
    }

    public function declineAbsen($id)
    {
        $data = [
            'verifikasi' => "Decline",
        ];
        $data = $this->harian->editData2($id, $data);
        $data1 = $this->harian->detailData($id);
        return redirect()->route('faskab.harian.absen', $data1->id_user)->with('success', 'Absensi Harian Decline.');
    }
}
