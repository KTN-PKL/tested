<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasdes;
use App\Models\poktan;
use App\Models\lokasi;
use App\Models\petani;
use Illuminate\Support\Facades\Hash;

class c_fasdes extends Controller
{
    public function __construct()
    {
        $this->fasdes = new fasdes();
        $this->poktan = new poktan();
        $this->lokasi = new lokasi();
        $this->petani = new petani();
    }
    public function index()
    {
        $data = ['fasdes' => $this->fasdes->allData(),];
        return view('fasdes.index', $data);
    }
    public function create()
    {
        return view('fasdes.create');
    }
    public function store(Request $request)
    {
        $id = $this->fasdes->maxIdUser();
        $id = $id + 1;
        $data = [
            'id' => $id,
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'level'=> "fasdes",
            'statusakun'=>"verified",
        ];
        $this->fasdes->addData($data);
        $data = ['id_user' => $id,];
        $this->lokasi->addData($data);
        return redirect()->route('faskab.fasdes.index')->with('success','Fasilitator Desa Berhasil Dibuat');
    }
    public function edit($id)
    {
        $data = ['fasdes' => $this->fasdes->detailData($id),];
        return view('fasdes.edit', $data);
    }

    public function detail($id)
    {
        $z = $this->poktan->fasdesData($id);
        $data = ['fasdes' => $this->fasdes->detailData($id),
                 'poktan' => $this->poktan->fasdesData($id),
                'petani'=> $this->petani->jumlahPetaniFasdes($id), ];
        return view('fasdes.detail', $data);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->notelp,
            'jeniskelamin' => $request->jeniskelamin,
        ];
        if ($request->password <> null) {
            $data = ['password' => Hash::make($request->password),];
        }
        $this->fasdes->editData($id, $data);
        return redirect()->route('faskab.fasdes.index')->with('success','Fasilitator Desa Berhasil Diupdate');
    }

    public function verifikasi($id)
    {
        $data = [
            'statusakun'=> "verified",
        ];
        $this->fasdes->editData($id, $data);
        return redirect()->route('faskab.fasdes.index')->with('success','Fasilitator Desa Berhasil diverifikasi');
    }
    public function destroy($id)
    {
        $this->fasdes->deleteData($id);
        $this->lokasi->deleteData($id);

        return redirect()->route('faskab.fasdes.index')->with('deleted','Fasilitator Desa Berhasil Dihapus');
    }
}
