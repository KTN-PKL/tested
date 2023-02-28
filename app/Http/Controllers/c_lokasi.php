<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lokasi;
use App\Models\kecamatan;
use App\Models\desa;

class c_lokasi extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->desa = new desa();
        $this->kecamatan = new kecamatan();
    }
    public function index()
    {
        $data = ['lokasi' => $this->lokasi->tested(),];
        return view('lokasi.index', $data);
    }
    public function create($id)
    {
        $data = ['id' => $id,];
        return view('lokasi.create');
    }
   
    public function edit($id)
    {
        $data = [
            'desa' => $this->desa->allData(),
            'kecamatan' => $this->kecamatan->allData(),
            'lokasi' => $this->lokasi->detailData($id),
        ];
        return view('lokasi.edit', $data);
    }

    public function desa($id, $id_kecamatan)
    {
        $data = [
            'desa' => $this->desa->kecamatanData($id_kecamatan),
            'lokasi' => $this->lokasi->detailData($id),
        ];
        return view('lokasi.desa', $data);
    }

    public function update(Request $request, $id)
    {
        $lokasi = str_replace(" ", "", $request->lokasi);
        $data = [
            'id_desa' => $request->id_desa,
            'lokasi' => $lokasi,
        ];
        $this->lokasi->editData($id, $data);
        return redirect()->route('faskab.lokasi.index');
    }
    public function destroy($id)
    {
        $this->lokasi->deleteData($id);
        return redirect()->route('faskab.lokasi.index');
    }
}
