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
        $data = ['desa' => $this->desa->allData,];
        return view('desa.index', $data);
    }
    public function create()
    {
        return view('desa.create');
    }
    public function store(Request $request)
    {
        $data = [
            'email' => $request->email,
            'name' => $request->name,
        ];
        $this->desa->addData($data);
        return redirect()->route('faskab.desa.index');
    }
    public function edit($id)
    {
        $data = ['desa' => $this->desa->detailData($id),];
        return view('desa.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
            'jeniskelamin' => $request->jeniskelamin,
        ];
        if ($request->password <> null) {
            $data = ['password' => Hash::make($request->password),];
        }
        $this->desa->editData($data, $id);
        return redirect()->route('faskab.desa.index');
    }
    public function destroy($id)
    {
        $this->desa->deleteData($id);
        return redirect()->route('faskab.desa.index');
    }
}
