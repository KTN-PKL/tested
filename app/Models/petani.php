<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class petani extends Model
{
    public function addData($data)
    {
        DB::table('petanis')->insert($data);
    }
    public function countPetani($id)
    {
        return DB::table('petanis')->where('id_poktan', $id)->get();
    }
    public function jumlahPetaniFasdes($id)
    {
        return DB::table('petanis')->where('id_fasdes', $id)->count();
    }
    public function editData($id_petani, $data)
    {
        return DB::table('petanis')->where('id_petani', $id_petani)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('petanis')->where('id_poktan', $id)->delete();
    }
    public function counttPetani($id)
    {
        return DB::table('petanis')->where('id_poktan', $id)->count();
    }
}
