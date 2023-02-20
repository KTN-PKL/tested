<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasdes;
use App\Models\poktan;
use App\Models\petani;
use App\Models\pelatihan;
use App\Models\bantuan;

class c_poktan extends Controller
{
    public function __construct()
    {
        $this->poktan = new poktan();
        $this->fasdes = new fasdes();
        $this->petani = new petani();
        $this->pelatihan = new pelatihan();
        $this->bantuan = new bantuan();
    }
    public function index()
    {
        $data = ['fasdes' => $this->fasdes->allData(),
    ];
        return view('poktan.index', $data);
    }

    public function poktan($id)
    {
        $data = ['poktan' => $this->poktan->fasdesData($id),
                 'fasdes'=>$this->fasdes->detailData($id),
                 'id'=>$id,
                ];
        return view('poktan.poktan', $data);
    }
    public function create($id)
    {
        $data = ['id'=>$id,

        ];
        return view('poktan.create', $data);
    }
    public function store(Request $request, $id)
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
                    'jumlahpetani' => $request->jumlahpetani,
              
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
                    'jumlahpetani' => $request->jumlahpetani,
              
                ];
                $this->poktan->addData($data);
      
        }
      
     
        return redirect()->route('poktan', $id);
    }

    public function edit($id)
    {
        $data = ['poktan' => $this->poktan->detailData($id),
        'petani'=>$this->petani->countPetani($id),
        'pelatihan' => $this->pelatihan->detailData($id),
        'bantuan' => $this->bantuan->detailData($id),
                              
    ];
        return view('poktan.edit', $data);
    }

    public function detail($id)
    {
       
        $data = ['poktan' => $this->poktan->detailData($id),
        'petani' => $this->petani->countPetani($id),
        'pelatihan' => $this->pelatihan->detailData($id),
        'bantuan' => $this->bantuan->detailData($id),];
        return view('poktan.detail', $data);
    }

    public function update(Request $request, $id)
    {
        $this->petani->deleteData($id);
        $this->bantuan->deleteData($id);
        $this->pelatihan->deleteData($id);
      
        
            for ($i=0; $i < $request->jf; $i++) { 
                $data = [
                    'id_poktan' => $id,
                    'namapetani' => $request->{"namapetani".$i },
                ];
                $this->petani->addData($data);
            }

            for ($i=0; $i < $request->jp; $i++) { 
                $data = [
                    'id_poktan' => $id,
                    'namabantuan' => $request->{"namabantuan".$i },
                    'waktubantuan' => $request->{"waktubantuan".$i },
                    'qtybantuan' => $request->{"qtybantuan".$i },
                ];
                $this->bantuan->addData($data);
            }

            for ($i=0; $i < $request->jz; $i++) { 
                $data = [
                    'id_poktan' => $id,
                    'namapelatihan' => $request->{"namapelatihan".$i },
                    'waktupelatihan' => $request->{"waktupelatihan".$i },
                    'jumlahpeserta' => $request->{"jumlahpeserta".$i },
                ];
                $this->pelatihan->addData($data);
            }
    
        $data = [
            'namapoktan' => $request->namapoktan,
            'luastanah' => $request->luastanah,
            'jumlahproduksi' => $request->jumlahproduksi,
            'pemeliharaan' => $request->pemeliharaan,
            'pasar' => $request->pasar,
            'lokasipoktan' => $request->lokasipoktan,
            'jumlahpetani' => $request->jumlahpetani,     
        ];
        $this->poktan->editData($id, $data);
        $data = $this->poktan->detailData($id);
        return redirect()->route('poktan', $data->id_user);
    }
    public function destroy($id)
    {
        $data = $this->poktan->detailData($id);
        $this->poktan->deleteData($id);
        $this->petani->deleteData($id);
        $this->bantuan->deleteData($id);
        $this->pelatihan->deleteData($id);
        return redirect()->route('poktan', $data->id_user)->with('success', 'Kelompok Petani Berhasil Dihapus');
    }

    public function chartLahan()
    {
        $poktan = $this->poktan->chartData();

        $i = 0;
        $h[0] = "Belum Ada Kelompok Tani";
        $v[0] = 0;

        if($poktan <> null)
        {
            foreach($poktan as $poktans)
            {
                $h[$i] = $poktans->name."(".$poktans->namapoktan.")";
                $v[$i] = $poktans->luastanah;
                $i = $i+1;
            }
        }
       
        $data = [
            'h' => $h,
            'v' => $v,
        ];

        return $data;
    }

    public function chartPanen()
    {
        $poktan = $this->poktan->chartData();

        $i = 0;
        $h[0] = "Belum Ada Kelompok Tani";
        $v[0] = 0;

        if($poktan <> null)
        {
            foreach($poktan as $poktans)
            {
                $h[$i] = $poktans->name."(".$poktans->namapoktan.")";
                $v[$i] = $poktans->jumlahproduksi;
                $i = $i+1;
            }
        }
       
        $data = [
            'h' => $h,
            'v' => $v,
        ];

        return $data;
    }
}
