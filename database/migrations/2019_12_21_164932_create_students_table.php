<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nis')->unique();
            $table->String('kode_cabang');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->integer('kelas');
            $table->string('jenjang');
            $table->integer('biaya');
            $table->integer('biaya_daftar');
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
        Schema::dropIfExists('students');
    }
}
