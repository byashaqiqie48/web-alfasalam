<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status_pendaftaran_status', ['lolos', 'tidak lolos', 'menunggu'])->default('lolos');
            //foreign key
            $table->unsignedBigInteger('tahun_ajar_id');
            $table->unsignedBigInteger('warga_belajar_id');
            $table->timestamps();
            $table->foreign('tahun_ajar_id')->references('id')->on('tahun_ajars')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('warga_belajar_id')->references('id')->on('warga_belajars')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
