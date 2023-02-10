<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class absenkegiatan extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('absenkegiatans')->get();
    }
    public function addData($data)
    {
        DB::table('absenkegiatans')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('absenkegiatans')->where('id_absenkegiatan', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('absenkegiatans')->where('id_absenkegiatan', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('absenkegiatans')->where('id_absenkegiatan', $id)->delete();
    }
    public function lokasi($id)
    {
        return DB::table('absenkegiatans')->join('lokasis', 'absenkegiatans.id','=','lokasis.id_user')->where('id', $id);
    }
    public function absenKegiatan($id, $t)
    {
        return DB::table('absenkegiatans')->where('tanggalabsen','like','%'.$t.'%')->where('id_user', $id)->get();
    }
    public function filterKegiatan($id, $filter)
    {
        return DB::table('absenkegiatans')->where('jeniskegiatan','like','%'.$filter.'%')->where('id_user', $id)->get();
    }

}
