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
    public function deleteData2($id)
    {
        return DB::table('absenkegiatans')->where('id_user', $id)->delete();
    }
    public function rk($data)
    {
        return DB::table('absenkegiatans')->where('tanggalabsen', $data)->count();
    }
    public function lokasi($id)
    {
        return DB::table('absenkegiatans')->join('lokasis', 'absenkegiatans.id','=','lokasis.id_user')->where('id', $id);
    }
    public function absenKegiatan($id, $t)
    {
        return DB::table('absenkegiatans')->where('tanggalabsen','like','%'.$t.'%')->where('id_user', $id)->get();
    }
    public function filterWaktu($id, $awal, $akhir)
    {
        return DB::table('absenkegiatans')->whereBetween('tanggalabsen',[$awal, $akhir])->where('id_user', $id)->get();
    }
    public function filterKegiatan($id, $filter)
    {
        return DB::table('absenkegiatans')->where('jeniskegiatan','like','%'.$filter.'%')->where('id_user', $id)->get();
    }
    public function filterKegiatanWaktu($id, $filter, $awal, $akhir)
    {
        return DB::table('absenkegiatans')->where('jeniskegiatan','like','%'.$filter.'%')->whereBetween('tanggalabsen',[$awal, $akhir])->where('id_user', $id)->get();
    }

    public function joinData($id)
    {
        return DB::table('absenkegiatans')->join('users', 'absenkegiatans.id_user','=','users.id')->where('id_absenkegiatan', $id)->first();
    }

    public function historyKegiatan($id, $tgl1, $tgl2)
    {
        return DB::table('absenkegiatans')->where('id_user', $id)->whereBetween('tanggalabsen', [$tgl1, $tgl2])->orderBy('tanggalabsen', 'DESC')->orderBy('waktuabsen','DESC')->get();
    }

}
