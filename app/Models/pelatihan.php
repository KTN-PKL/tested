<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pelatihan extends Model
{
    use HasFactory;
    public function addData($data)
    {
        DB::table('pelatihans')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('pelatihans')->where('id_poktan', $id)->get();
    }
    public function editData($id, $data)
    {
        return DB::table('pelatihans')->where('id_poktan', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('pelatihans')->where('id_poktan', $id)->delete();
    }
}
