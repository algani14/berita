<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')
            ->on('mahasiswas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *   Illuminate\Database\QueryException  : SQLSTATE[42S01]: Base table or view already exists: 1050 Table 'mahasiswas' already exists (SQL: create table `mahasiswas` (`id_dosen` bigint unsigned not null) default character set utf8mb4 collate 'utf8mb4_unicode_ci')

     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('walis');
    }
}
