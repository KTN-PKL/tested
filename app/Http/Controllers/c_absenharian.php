<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absenharian;
use App\Models\lokasi;
use Auth;

class c_absenharian extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->harian = new absenharian();
    }
    public function index()
    {
        $data = ['harian' => $this->harian->allData(),];
        return view('harian.index', $data);
    }
    public function create()
    {
        return view('user.absen.harian');
    }
    public function simpangambar($data, $name)
    {
        $img = str_replace('data:image/png;base64,', '', $data);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
        $filename = $name . '.png';
        $file = public_path('foto')."/".$filename;
        file_put_contents($file, $data);
        return $filename;
    }
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $t = date("h:i");
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
            'jenis' => "masuk",
        ];
        $this->harian->addData($data);
        return redirect()->route('absen.harian');
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
            'id_kecamatan' => $request->id_kecamatan,
            'harian' => $request->harian,
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
