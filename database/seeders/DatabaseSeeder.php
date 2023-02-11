<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'adminbaru',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'level' => 'admin',
            
            
        ]);
        // DB::table('poktans')->insert([
        //     'id_poktan' => '1',
        //     'id_user' => '0',
        //     'namapoktan' => '0',
        //     'luastanah' => '0',
        //     'jumlahproduksi' => '0',
        //     'pemeliharaan' => '0',
        //     'pasar' => '0',
        //     'lokasipoktan' => '0',
            
        // ]);
    }
}
