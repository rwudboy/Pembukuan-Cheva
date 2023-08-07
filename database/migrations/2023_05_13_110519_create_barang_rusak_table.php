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
        Schema::create('barang_rusaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_masuk_id');
            $table->foreign('barang_masuk_id')->on('barang_masuks')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('keterangan');
            $table->integer('stok_keluar');
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
        Schema::dropIfExists('barang_rusaks');
    }
};
