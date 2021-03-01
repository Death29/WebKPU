<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonlegisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calonlegis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim',8);
            $table->string('nama');
            $table->string('jenis_legislatif');
            $table->string('fakultas');
            $table->string('jurusan');
            $table->integer('suara');
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
        Schema::dropIfExists('calonlegis');
    }
}
