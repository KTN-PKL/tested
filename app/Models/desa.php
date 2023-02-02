<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class desa extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('desas')->get();
    }
    public function kecamatanData($id)
    {
        return DB::table('desas')->where('id_kecamatan', $id)->get();
    }
    public function addData($data)
    {
        DB::table('desas')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('desas')->where('id_desa', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('desas')->where('id_desa', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('desas')->where('id_desa', $id)->delete();
    }
}
