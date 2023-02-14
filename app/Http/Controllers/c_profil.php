<?php

namespace App\Http\Controllers;
use App\Models\fasdes;
use App\Models\poktan;
use App\Models\lokasi;
use App\Models\petani;
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
                ];
        return view('user.u_profile', $data);
    }
    public function viewHistory($id)
    {
        $data = ['fasdes' => $this->fasdes->detailData($id),
                  ];
        return view('user.history', $data);
    }
    public function viewDetailpoktan($id)
    {
        $data = ['poktan' => $this->poktan->detailData($id),
        'petani' => $this->petani->countPetani($id),
                  ];
        return view('user.detail_poktan', $data);
    }
    public function viewEditpoktan($id)
    {
        $data = ['poktan' => $this->poktan->detailData($id),
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
                    'namabantuan' => $request->namabantuan,
                    'qtybantuan' => $request->qtybantuan,
                    'waktubantuan'=> $request->waktubantuan,
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
                    'namabantuan' => $request->namabantuan,
                    'qtybantuan' => $request->qtybantuan,
                    'waktubantuan'=> $request->waktubantuan,
                ];
                $this->poktan->addData($data);
      
        }
      
     
        return redirect()->route('fasdes.profil', $id)->with('success', 'Kelompok Petani Berhasil Dibuat');
    }
    public function destroyPoktan($id)
    {
        $data = $this->poktan->detailData($id);
        $this->poktan->deleteData($id);
        $this->petani->deleteData($id);
        return redirect()->route('fasdes.profil', $data->id_user)->with('success', 'Kelompok Petani Berhasil Dihapus');
    }
}
