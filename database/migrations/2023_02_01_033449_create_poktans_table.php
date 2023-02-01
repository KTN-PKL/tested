<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poktans', function (Blueprint $table) {
            $table->id('id_poktan');
            $table->string('id_user', 20);
            $table->string('luastanah', 50);
            $table->string('jumlahproduksi', 50);
            $table->string('pemeliharaan');
            $table->string('pasar', 15);
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poktans');
    }
};
