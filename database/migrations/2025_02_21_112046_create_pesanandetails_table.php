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
        Schema::create('pesanandetail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            $table->unsignedBigInteger('jenispaket_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('jumlah');
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('jenispaket_id')->references('id')->on('jenispaket')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('item')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanandetail');
    }
};
