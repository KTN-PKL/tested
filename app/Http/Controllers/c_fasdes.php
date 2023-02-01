<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasdes;
use Illuminate\Support\Facades\Hash;

class c_fasdes extends Controller
{
    public function __construct()
    {
        $this->fasdes = new fasdes();
    }
    public function index()
    {
        $data = ['fasdes' => $this->fasdes->allData,];
        return view('fasdes.index', $data);
    }
    public function create()
    {
        return view('fasdes.create');
    }
    public function store(Request $request)
    {
        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ];
        $this->fasdes->addData($data);
        return redirect()->route('faskab.fasdes.index');
    }
    public function edit($id)
    {
        $data = ['fasdes' => $this->fasdes->detailData($id),];
        return view('fasdes.edit', $data);
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
        $this->fasdes->editData($data, $id);
        return redirect()->route('faskab.fasdes.index');
    }
    public function destroy($id)
    {
        $this->fasdes->deleteData($id);
        return redirect()->route('faskab.fasdes.index');
    }
}
