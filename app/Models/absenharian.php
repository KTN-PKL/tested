<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class absenharian extends Model
{
    use HasFactory;

    public function search($id, $tgl1, $tgl2)
    {
        return DB::table('absenharians')->where('id_user', $id)->whereBetween('tgl', [$tgl1, $tgl2])->get();
    }
    public function allData($id, $bulan)
    {
        return DB::table('absenharians')->where('id_user', $id)->where('tgl', 'like', '%'.$bulan.'%')->get();
    }
    public function jumlahData($id, $tgl1, $tgl2)
    {
        return DB::table('absenharians')->where('id_user', $id)->whereBetween('tgl', [$tgl1, $tgl2])->count();
    }
    public function addData($data)
    {
        DB::table('absenharians')->insert($data);
    }
    public function cek($id, $data)
    {
        return DB::table('absenharians')->where('id_user', $id)->where('tgl', $data)->first();
    }
    public function detailData($id)
    {
        return DB::table('absenharians')->where('id_absenharian', $id)->first();
    }
    public function editData($id, $hari, $data)
    {
        return DB::table('absenharians')->where('id_user', $id)->where('tgl', $hari)->update($data);
    }
    public function editData2($id, $data)
    {
        return DB::table('absenharians')->where('id_absenharian', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('absenharians')->where('id_absenharian', $id)->delete();
    }
}
