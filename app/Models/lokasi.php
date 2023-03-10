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
    public function detailData2($id)
    {
        return DB::table('lokasis')->where('id_user', $id)->first();
    }
    public function detailData3($id)
    {
        return DB::table('lokasis')->join('users', 'lokasis.id_user', '=', 'users.id')->leftjoin('desas', 'lokasis.id_desa', '=', 'desas.id_desa')->leftjoin('kecamatans', 'desas.id_kecamatan','=','kecamatans.id_kecamatan')->where('id_user', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('lokasis')->where('id_lokasi', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('lokasis')->where('id_user', $id)->delete();
    }
    public function detail3Data($id)
    {
        return DB::table('lokasis')->join('users', 'lokasis.id_user', '=', 'users.id')->leftjoin('desas', 'lokasis.id_desa', '=', 'desas.id_desa')->where('id_user', $id)->first();
    }
    public function editDataFasdes($id, $data)
    {
        return DB::table('lokasis')->where('id_user', $id)->update($data);
    }

    public function tested()
    {
        return DB::table('lokasis')->join('users', 'lokasis.id_user', '=', 'users.id')->leftjoin('desas', 'lokasis.id_desa', '=', 'desas.id_desa')->leftjoin('kecamatans', 'desas.id_kecamatan','=','kecamatans.id_kecamatan')->get();
    }

}
