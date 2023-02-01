<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class poktan extends Model
{
    use HasFactory;

    public function fasdesData($id)
    {
        return DB::table('poktans')->where('id_user', $id)->get();
    }
    public function addData($data)
    {
        DB::table('poktans')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('poktans')->where('id_poktan', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('poktans')->where('id_poktan', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('poktans')->where('id_poktan', $id)->delete();
    }
}
