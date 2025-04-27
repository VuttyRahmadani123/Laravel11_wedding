<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('jenispaket_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('total_harga');
            $table->date('tgl_acara');
            $table->time('jam_acara');
            $table->text('lokasi_acara');
            $table->text('catatan');
            $table->timestamps();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jenispaket_id')->references('id')->on('jenispaket')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('item')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
