<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaBelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga_belajars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('password');
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->enum('gender', ['L', 'P']);
            $table->string('phone');
            $table->integer('anak_ke');
            $table->string('jenis_ijazah');
            $table->string('tahun_ijazah');
            $table->string('nomor_ijazah');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->text('alamat_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_ibu');
            $table->integer('no_ktp');
            $table->enum('paket', ['Paket A', 'Paket B', 'Paket C']);
            $table->string('lampiran_ktp')->nullable();
            $table->unsignedBigInteger('tahun_ajar_id');
            //include created at dan updated at
            $table->timestamps();
            $table->foreign('tahun_ajar_id')->references('id')->on('tahun_ajars')->onDelete('cascade');

            $table->integer('user_id')->unsigned();   
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warga_belajars');
    }
}
