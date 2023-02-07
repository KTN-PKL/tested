<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class absenharian extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('absenharians')->get();
    }
    public function addData($data)
    {
        DB::table('absenharians')->insert($data);
    }
    public function cek($id, $data)
    {
        return DB::table('absenharians')->where('id_user', $id)->where('tgl', $data)->count();
    }
    public function detailData($id)
    {
        return DB::table('absenharians')->where('id_absenharian', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('absenharians')->where('id_absenharian', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('absenharians')->where('id_absenharian', $id)->delete();
    }
}
