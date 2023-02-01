<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kecamatan;

class c_kecamatan extends Controller
{
    public function __construct()
    {
        $this->kecamatan = new kecamatan();
    }
    public function index()
    {
        $data = ['kecamatan' => $this->kecamatan->allData,];
        return view('kecamatan.index', $data);
    }
    public function create()
    {
        return view('kecamatan.create');
    }
    public function store(Request $request)
    {
        $data = [
            'kecamatan' => $request->kecamatan,
        ];
        $this->kecamatan->addData($data);
        return redirect()->route('faskab.kecamatan.index');
    }
    public function edit($id)
    {
        $data = ['kecamatan' => $this->kecamatan->detailData($id),];
        return view('kecamatan.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'kecamatan' => $request->kecamatan,
        ];
        $this->kecamatan->editData($data, $id);
        return redirect()->route('faskab.kecamatan.index');
    }
    public function destroy($id)
    {
        $this->kecamatan->deleteData($id);
        return redirect()->route('faskab.kecamatan.index');
    }
}
