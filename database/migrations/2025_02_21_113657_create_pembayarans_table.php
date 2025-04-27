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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            $table->date('tgl_bayar');
            $table->integer('total_bayar');
            $table->enum('metode_pembayaran',['tunai', 'transfer']);
            $table->enum('status_pembayaran',['belum dibayar', 'DP dibayar', 'FP dibayar', 'DP & FP dibayar', 'pembayaran dikembalikan']);
            $table->timestamps();
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
