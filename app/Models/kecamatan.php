<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kecamatan extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('kecamatans')->get();
    }
    public function addData($data)
    {
        DB::table('kecamatans')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('kecamatans')->where('id_kecamatan', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('kecamatans')->where('id_kecamatan', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('kecamatans')->where('id_kecamatan', $id)->delete();
    }
}
