<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_anggota')->unsigned();
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tempat_sidi')->nullable();
            $table->date('tgl_sidi')->nullable();
            $table->string('pendeta')->nullable();
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
        Schema::dropIfExists('sidi');
    }
}
