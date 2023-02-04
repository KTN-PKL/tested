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
        Schema::create('absenkegiatans', function (Blueprint $table) {
            $table->id('id_absenkegiatan');
            $table->string('id_user', 20);
            $table->string('waktuabsen');
            $table->string('lokasiabsen');
            $table->string('jeniskegiatan');
            $table->string('deskripsikegiatan');
            $table->string('pelatihan');
            $table->string('selfiekegiatan')->nullable();
            $table->string('fotokegiatan')->nullable();
            $table->string('fotopelatihan')->nullable();
            $table->string('judulpelatihan')->nullable();
            $table->string('durasipelatihan')->nullable();
            $table->string('tempatpelatihan')->nullable();
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
        Schema::dropIfExists('absenharians');
    }
};
