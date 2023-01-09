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
        Schema::create('produk_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('id_pesanan');
            $table->string('id_produk');
            $table->string('nama_item');
            $table->string('jumlah_produk');
            $table->string('tgl_sewa');
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
        Schema::dropIfExists('produk_pesanan');
    }
};
