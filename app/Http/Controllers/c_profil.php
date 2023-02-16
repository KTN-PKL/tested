<?php

namespace App\Http\Controllers;
use App\Models\fasdes;
use App\Models\poktan;
use App\Models\lokasi;
use App\Models\petani;
use App\Models\kecamatan;
use App\Models\desa;
use App\Models\absenharian;
use App\Models\absenkegiatan;
use App\Models\pelatihan;
use App\Models\bantuan;
use Illuminate\Http\Request;
use Auth;

class c_profil extends Controller
{
    public function __construct()
    {
        $this->fasdes = new fasdes();
        $this->poktan = new poktan();
        $this->lokasi = new lokasi();
        $this->petani = new petani();
        $this->kecamatan = new kecamatan();
        $this->desa = new desa();
        $this->absenharian = new absenharian();
        $this->absenkegiatan = new absenkegiatan();
        $this->pelatihan = new pelatihan();
        $this->bantuan = new bantuan();
    }

    // public function index($id)
    // {
    //     $data = ['fasdes' => $this->fasdes->detailData(),];
    //     return view('fasdes.index', $data);
    // }

     public function viewProfil()
    {
        $id = Auth::user()->id;
        $data = ['fasdes' => $this->fasdes->detailData($id),
                 'poktan' => $this->poktan->fasdesData($id),
                 'lokasi' => $this->lokasi->detail3Data($id),
                ];
        return view('user.u_profile', $data);
    }
    public function viewEditprofil()
    {
        $id = Auth::user()->id;
        $data = ['fasdes' => $this->fasdes->detailData($id),
                 'lokasi'=> $this->lokasi->detail3Data($id),
                 'kecamatan' => $this->kecamatan->allData(),
                  ];
        return view('user.edit_profil', $data);
    }

    public function desa($id_kecamatan)
    {
        $id = Auth::user()->id;
        $data = [
            'desa' => $this->desa->kecamatanData($id_kecamatan),
            'lokasi' => $this->lokasi->detail3Data($id),
        ];
        return view('user.p_desa', $data);
    }

    public function viewHistory()
    {
        $id = Auth::user()->id;
        $data = ['fasdes' => $this->fasdes->detailData($id),
                'absenharian'=> $this->absenharian->allData($id),
                'absenkegiatan'=> $this->absenkegiatan->historyKegiatan($id),
                  ];
           
        return view('user.history', $data);
    }
    public function viewDetailpoktan($id)
    {
        $data = ['poktan' => $this->poktan->detailData($id),
                 'petani' => $this->petani->countPetani($id),
                 'pelatihan' => $this->pelatihan->detailData($id),
                 'bantuan' => $this->bantuan->detailData($id),
                  ];

            
        return view('user.detail_poktan', $data);
    }
    public function viewEditpoktan($id)
    {
        $data = ['poktan' => $this->poktan->detailData($id),
                'petani' => $this->petani->countPetani($id),
                 'pelatihan' => $this->pelatihan->detailData($id),
                 'bantuan' => $this->bantuan->detailData($id),
                  ];
        return view('user.update_poktan', $data);
    }
    public function viewCreatepoktan($id)
    {
        return view('user.tambah_poktan');
    }
    public function storePoktan(Request $request ,$id)
    {
      
        $count = $this->poktan->maxIdPoktan();
        if($count == null)
        {
            for ($i=0; $i < $request->jumlah; $i++) { 
                $referenceID = $this->poktan->countAllPoktan();
                $id_poktan = $referenceID + 1;
                $data = [
                
                    'id_poktan' => $id_poktan,
                    'namapetani' => $request->{"namapetani".$i },
                ];
                $this->petani->addData($data);
            }
        }else{
            for ($i=0; $i < $request->jumlah; $i++) { 
                $referenceMAXID = $this->poktan->maxIdPoktan();
                $id_poktan = $referenceMAXID + 1;
                $data = [
                
                    'id_poktan' => $id_poktan,
                    'namapetani' => $request->{"namapetani".$i },
                ];
                $this->petani->addData($data);
            }
      
        }

       
        if($count == null)
        {
            for ($i=0; $i < $request->jp; $i++) { 
                $referenceID = $this->poktan->countAllPoktan();
                $id_poktan = $referenceID + 1;
                $data = [
                    'id_poktan' => $id_poktan,
                    'namabantuan' => $request->{"namabantuan".$i },
                    'waktubantuan' => $request->{"waktubantuan".$i },
                    'qtybantuan' => $request->{"qtybantuan".$i },
                ];
                $this->bantuan->addData($data);
            }
        }else{
            for ($i=0; $i < $request->jp; $i++) { 
                $referenceMAXID = $this->poktan->maxIdPoktan();
                $id_poktan = $referenceMAXID + 1;
                $data = [
                    'id_poktan' => $id_poktan,
                    'namabantuan' => $request->{"namabantuan".$i },
                    'waktubantuan' => $request->{"waktubantuan".$i },
                    'qtybantuan' => $request->{"qtybantuan".$i },
                ];
                $this->bantuan->addData($data);
            }
      
        }

        if($count == null)
        {
            for ($i=0; $i < $request->jl; $i++) { 
                $referenceID = $this->poktan->countAllPoktan();
                $id_poktan = $referenceID + 1;
                $data = [
                    'id_poktan' => $id_poktan,
                    'namapelatihan' => $request->{"namapelatihan".$i },
                    'waktupelatihan' => $request->{"waktupelatihan".$i },
                    'jumlahpeserta' => $request->{"jumlahpeserta".$i },
                ];
                $this->pelatihan->addData($data);
            }
        }else{
            for ($i=0; $i < $request->jl; $i++) { 
                $referenceMAXID = $this->poktan->maxIdPoktan();
                $id_poktan = $referenceMAXID + 1;
                $data = [
                    'id_poktan' => $id_poktan,
                    'namapelatihan' => $request->{"namapelatihan".$i },
                    'waktupelatihan' => $request->{"waktupelatihan".$i },
                    'jumlahpeserta' => $request->{"jumlahpeserta".$i },
                ];
                $this->pelatihan->addData($data);
            }
      
        }





        $count = $this->poktan->maxIdPoktan();
        if($count == null)
        {
            
                $referenceID = $this->poktan->countAllPoktan();
                $id_poktan = $referenceID + 1;
                $data = [
                    'id_poktan'=> $id_poktan,
                    'id_user' => $id,
                    'namapoktan' => $request->namapoktan,
                    'luastanah' => $request->luastanah,
                    'jumlahproduksi' => $request->jumlahproduksi,
                    'pemeliharaan' => $request->pemeliharaan,
                    'pasar' => $request->pasar,
                    'lokasipoktan' => $request->lokasipoktan,
                ];
                $this->poktan->addData($data);
        }else{
           
                $referenceMAXID = $this->poktan->maxIdPoktan();
                $id_poktan = $referenceMAXID + 1;
                $data = [
                    'id_poktan'=> $id_poktan,
                    'id_user' => $id,
                    'namapoktan' => $request->namapoktan,
                    'luastanah' => $request->luastanah,
                    'jumlahproduksi' => $request->jumlahproduksi,
                    'pemeliharaan' => $request->pemeliharaan,
                    'pasar' => $request->pasar,
                    'lokasipoktan' => $request->lokasipoktan,
                ];
                $this->poktan->addData($data);
      
        }
      
     
        return redirect()->route('fasdes.profil', $id)->with('success', 'Kelompok Petani Berhasil Dibuat');
    }
     
    public function updateProfil(Request $request, $id)
    {
        if($request->profil <> null){
            $file = $request->profil;
            $filename=$request->email.'.png';   
            $file->move(public_path('foto/profilfasdes'),$filename);
            $data['profil'] = $filename;
            $this->fasdes->editData($id, $data);
        }

        if($request->password <> null){
            $data = [
                'password' => Hash::make($request->password),
            ];
            $this->fasdes->editData($id, $data);
        }

        
        $data = [
            'id_desa' => $request->id_desa,
            'lokasi'=> $request->lokasi,    
        ];
        $this->lokasi->editDataFasdes($id, $data);


        $data = [
            'name'=>$request->name,
            'jeniskelamin'=>$request->jeniskelamin,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat,
            
        ];
        $this->fasdes->editData($id, $data);
        return redirect()->route('fasdes.profil', $id)->with('success','Profil berhasil diupdate');
    }

    public function destroyPoktan($id)
    {
        $data = $this->poktan->detailData($id);
        $this->poktan->deleteData($id);
        $this->petani->deleteData($id);
        $this->bantuan->deleteData($id);
        $this->pelatihan->deleteData($id);
        return redirect()->route('fasdes.profil', $data->id_user)->with('success', 'Kelompok Petani Berhasil Dihapus');
    }
}
