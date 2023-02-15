<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bantuan extends Model
{
    use HasFactory;
    public function addData($data)
    {
        DB::table('bantuans')->insert($data);
    }
    public function detailData($id)
    {
        return DB::table('bantuans')->where('id_poktan', $id)->first();
    }
    public function editData($id, $data)
    {
        return DB::table('bantuans')->where('id_poktan', $id)->update($data);
    }
}
