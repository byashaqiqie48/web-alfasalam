<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunAjarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_ajars', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajar');
            $table->enum('status_dibuka_tahun_ajar', ['dibuka', 'ditutup']);
            $table->timestamps();
            $table->enum('status_pendaftaran', ['dibuka', 'ditutup'])->default('ditutup');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tahun_ajars');
    }
}
