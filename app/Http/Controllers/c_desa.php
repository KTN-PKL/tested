<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\desa;
use App\Models\kecamatan;

class c_desa extends Controller
{
    public function __construct()
    {
        $this->kecamatan = new kecamatan();
        $this->desa = new desa();
    }
    public function index()
    {
        $data = ['desa' => $this->desa->allData(),];
        return view('desa.index', $data);
    }
    public function create()
    {
        $data = ['kecamatan' => $this->kecamatan->allData(),];
        return view('desa.create', $data);
    }
    public function store(Request $request)
    {
        $data = [
            'id_kecamatan' => $request->id_kecamatan,
            'desa' => $request->desa,
        ];
        $this->desa->addData($data);
        return redirect()->route('faskab.desa.index');
    }
    public function edit($id)
    {
        $data = [
            'kecamatan' => $this->kecamatan->allData(),
            'desa' => $this->desa->detailData($id),
        ];
        return view('desa.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'id_kecamatan' => $request->id_kecamatan,
            'desa' => $request->desa,
        ];
        $this->desa->editData($id, $data);
        return redirect()->route('faskab.desa.index');
    }
    public function destroy($id)
    {
        $this->desa->deleteData($id);
        return redirect()->route('faskab.desa.index');
    }
}
