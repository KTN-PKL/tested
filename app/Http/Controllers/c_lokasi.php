<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lokasi;

class c_lokasi extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
    }
    public function index()
    {
        $data = ['lokasi' => $this->lokasi->allData(),];
        return view('lokasi.index', $data);
    }
    public function create($id)
    {
        $data = [
            'desa' => $this->desa->allData(),
            'kecamatan' => $this->kecamatan->allData(),
            'id' => $id,
        ];
        return view('lokasi.create');
    }
    public function store(Request $request, $id)
    {
        $data = [
            'id_user' => $id,
            'id_desa' => $request->id_desa,
            'lokasi' => $request->lokasi,
        ];
        $this->lokasi->addData($data);
        return redirect()->route('faskab.lokasi.index');
    }
    public function edit($id)
    {
        $data = ['lokasi' => $this->lokasi->detailData($id),];
        return view('lokasi.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'id_desa' => $request->id_desa,
            'lokasi' => $request->lokasi,
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
