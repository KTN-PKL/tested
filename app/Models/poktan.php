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
    public function editData2($id, $data)
    {
        return DB::table('poktans')->where('id_user', $id)->update($data);
    }
    public function deleteData($id)
    {
        return DB::table('poktans')->where('id_poktan', $id)->delete();
    }
    public function countAllpoktan()
    {
        return DB::table('poktans')->count();    
    }
    public function maxIdPoktan()
    {
        return DB::table('poktans')->max('id_poktan');
    }
    public function chartData()
    {
        return DB::table('poktans')->join('users','poktans.id_user','=','users.id')->get();
    }

    public function freePoktan()
    {
        return DB::table('poktans')->where('id_user', null)->get();
    }

}
