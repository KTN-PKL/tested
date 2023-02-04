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
        $data = ['kecamatan' => $this->kecamatan->allData(),];
        return view('user.absen.harian', $data);
    }
    public function store(Request $request)
    {
        $img = str_replace('data:image/png;base64,', '', $request->selfie);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
        $filename = uniqid() . '.png';
        $file = public_path('foto')."/".$filename;
        file_put_contents($file, $data);
        $data = [
            'id_user' => Auth::user()->id,
            'lokasiharian' => $request->lokasi,
            'fotofasdes' => $filename,
            'deskripsi' => $request->deskripsi,
            'fotokegiatanharian' => $filename,
            'harian' => $request->harian,
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
