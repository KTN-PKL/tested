<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class fasdes extends Model
{
    use HasFactory;

    public function id()
    {
        return DB::table('users')->count();
    }
    public function allData()
    {
        return DB::table('users')->get();
    }
    public function addData($data)
    {
        DB::table('users')->insert($data);
    }
    public function detailData($id_user)
    {
        return DB::table('users')->where('id_user', $id_user)->first();
    }
    public function editData($id_user, $data)
    {
        return DB::table('users')->where('id_user', $id_user)->update($data);
    }
    public function deleteData($id_user)
    {
        return DB::table('users')->where('id_user', $id_user)->delete();
    }
}
