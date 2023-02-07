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
        Schema::create('absenharians', function (Blueprint $table) {
            $table->id('id_absenharian');
            $table->string('id_user', 20);
            $table->string('lokasiharian');
            $table->string('fotofasdes', 50);
            $table->string('tgl', 50);
            $table->string('jam', 20);
            $table->text('deskripsi');
            $table->string('fotokegiatanharian');
            $table->string('lokasipulang')->nullabel();
            $table->string('fotofasdespulang', 50)->nullabel();
            $table->string('jampulang', 20)->nullabel();
            $table->text('deskripsipulang')->nullabel();
            $table->string('fotokegiatanharianpulang')->nullabel();
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
