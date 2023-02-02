<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class lokasi extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('lokasis')->join('users', 'lokasis.id_user', '=', 'users.id')->get();
    }
    public function addData($data)
    {
        DB::table('lokasis')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('lokasis')->join('users', 'lokasis.id_user', '=', 'users.id')->leftjoin('desas', 'lokasis.id_desa', '=', 'desas.id_desa')->where('id_lokasi', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('lokasis')->where('id_lokasi', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('lokasis')->where('id_lokasi', $id)->delete();
    }
}
