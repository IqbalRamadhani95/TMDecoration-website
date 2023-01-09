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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->string('id_pelanggan');
            $table->string('nama_pelanggan');
            $table->string('noHp');
            $table->date('tanggal_sewa');
            $table->date('tanggal_selesai');
            $table->string('id_invoice');
            $table->integer('total_harga');
            $table->string('alamat_pelanggan');
            $table->string('bukti_transfer')->nullable();
            $table->integer('status_bayar');
            $table->string('status');
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
        Schema::dropIfExists('pesanan');
    }
};
