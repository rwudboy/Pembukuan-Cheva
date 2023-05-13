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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->foreignId('barang_id');
            $table->foreign('barang_id')->on('barangs')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status');
            $table->string('keterangan');
            $table->integer('stok_masuk');
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
        Schema::dropIfExists('barang_masuks');
    }
};
