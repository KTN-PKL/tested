<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasdes;
use App\Models\poktan;
use App\Models\lokasi;
use App\Models\petani;
use App\Models\absenharian;
use App\Models\absenkegiatan;
use Illuminate\Support\Facades\Hash;

class c_fasdes extends Controller
{
    public function __construct()
    {
        $this->fasdes = new fasdes();
        $this->poktan = new poktan();
        $this->lokasi = new lokasi();
        $this->petani = new petani();
        $this->absenharian = new absenharian();
        $this->absenkegiatan = new absenkegiatan();
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
            'profil'=>"default.jpg",
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
                //  'petani'=> $this->petani->jumlahPetaniFasdes($id),
                    // 'lokasi'=> $this->lokasi->detail3Data($id),
                    'lokasi'=> $this->lokasi->detailData3($id),
                ];
             
        return view('fasdes.detail', $data);
    }
    public function update(Request $request, $id)
    {
        if($request->profil <> null){
            $file = $request->profil;
            $filename=$request->email.'.png';   
            $file->move(public_path('foto/profilfasdes'),$filename);
            $data['profil'] = $filename;
            $this->fasdes->editData($id, $data);
        }
        
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
        $this->absenharian->deleteData2($id);
        $this->absenkegiatan->deleteData2($id);

        $data = [
            'id_user' => null,
        ];
        $this->poktan->editData2($id, $data);

    
        return redirect()->route('faskab.fasdes.index')->with('deleted','Fasilitator Desa Berhasil Dihapus');
    }
}
