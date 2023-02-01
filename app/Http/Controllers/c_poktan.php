<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasdes;
use App\Models\poktan;

class c_poktan extends Controller
{
    public function __construct()
    {
        $this->poktan = new poktan();
        $this->fasdes = new fasdes();
    }
    public function index()
    {
        $data = ['fasdes' => $this->fasdes->allData(),];
        return view('poktan.index', $data);
    }

    public function poktan($id)
    {
        $data = ['poktan' => $this->poktan->fasdesData($id),];
        return view('poktan.poktan', $data);
    }
    public function create()
    {
        return view('poktan.create');
    }
    public function store(Request $request)
    {
        $data = [
            'id_user' => $request->id_user,
            'namapoktan' => $request->namapoktan,
            'namapoktan' => $request->namapoktan,
            'luastanah' => $request->luastanah,
            'jumlahproduksi' => $request->jumlahproduksi,
            'pemeliharaan' => $request->pemeliharaan,
            'pasar' => $request->pasar,
            'lokasipoktan' => $request->lokasipoktan,
            'jumlahpetani' => $request->jumlahpetani,
        ];
        $this->poktan->addData($data);
        return redirect()->route('faskab.poktan.index');
    }
    public function edit($id)
    {
        $data = ['poktan' => $this->poktan->detailData($id),];
        return view('poktan.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $data = [
            'id_user' => $request->id_user,
            'namapoktan' => $request->namapoktan,
            'namapoktan' => $request->namapoktan,
            'luastanah' => $request->luastanah,
            'jumlahproduksi' => $request->jumlahproduksi,
            'pemeliharaan' => $request->pemeliharaan,
            'pasar' => $request->pasar,
            'lokasipoktan' => $request->lokasipoktan,
            'jumlahpetani' => $request->jumlahpetani,
        ];
        $this->poktan->editData($data, $id);
        return redirect()->route('faskab.poktan.index');
    }
    public function destroy($id)
    {
        $this->poktan->deleteData($id);
        return redirect()->route('faskab.poktan.index');
    }
}
