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
        return view('harian.create', $data);
    }
    public function store(Request $request)
    {
        $data = [
            'id_user' => Auth::user()->id,
            'lokasiharian' => $request->lokasi,
            'fotofasdes' => $request->selfie,
            'deskripsi' => $request->deskripsi,
            'fotokegiatanharian' => $request->kegiatan,
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
