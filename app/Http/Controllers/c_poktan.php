<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasdes;
use App\Models\poktan;
use App\Models\petani;

class c_poktan extends Controller
{
    public function __construct()
    {
        $this->poktan = new poktan();
        $this->fasdes = new fasdes();
        $this->petani = new petani();
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
        $count = $this->poktan->countAllpoktan();
        $id_poktan = $count + 1;
         for ($i=0; $i < $request->jumlah; $i++) { 
            $data = [
                'id_fasdes' => $id,
                'id_poktan' => $id_poktan,
                'namapetani' => $request->{"namapetani".$i },
            ];
        
            $this->petani->addData($data);
        }
      
        $data = [
            'id_user' => $id,
            'namapoktan' => $request->namapoktan,
            'luastanah' => $request->luastanah,
            'jumlahproduksi' => $request->jumlahproduksi,
            'pemeliharaan' => $request->pemeliharaan,
            'pasar' => $request->pasar,
            'lokasipoktan' => $request->lokasipoktan,
        ];
        $this->poktan->addData($data);
        return redirect()->route('poktan', $id);
    }
    public function edit($id)
    {
        $data = ['poktan' => $this->poktan->detailData($id),
        'petani'=>$this->petani->countPetani($id),
                              
    ];
        return view('poktan.edit', $data);
    }

    public function detail($id)
    {
        $data = ['poktan' => $this->poktan->detailData($id),
        'petani' => $this->petani->countPetani($id),];
        return view('poktan.detail', $data);
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
        $data = [
            'namapoktan' => $request->namapoktan,
            'namapoktan' => $request->namapoktan,
            'luastanah' => $request->luastanah,
            'jumlahproduksi' => $request->jumlahproduksi,
            'pemeliharaan' => $request->pemeliharaan,
            'pasar' => $request->pasar,
            'lokasipoktan' => $request->lokasipoktan,
    
        ];
        $this->poktan->editData($id, $data);
        $data = $this->poktan->detailData($id);
        return redirect()->route('poktan', $data->id_user);
    }
    public function destroy($id)
    {
        $data = $this->poktan->detailData($id);
        $this->poktan->deleteData($id);
        return redirect()->route('poktan', $data->id_user);
    }
}
