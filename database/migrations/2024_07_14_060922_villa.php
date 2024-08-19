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
        Schema::create('tbl_villa', function (Blueprint $table) {
            $table->string('id_villa')->primary();
            $table->string('nama_villa');
            $table->string('status');
            $table->string('harga');
            $table->string('luas');
            $table->string('uraian');
            $table->string('jml_kmr_tidur');
            $table->string('jml_kmr_mandi');
            $table->string('gbr_ruang_tamu')->nullable();
            $table->string('gbr_kolam')->nullable();
            $table->string('gbr_rooftop')->nullable();
            $table->string('gbr_carport')->nullable();
            $table->string('gbr_ruang_keluarga')->nullable();
            $table->string('gbr_bathroom')->nullable();
            $table->string('gbr_spa')->nullable();
            $table->string('gbr_kamar1')->nullable();
            $table->string('gbr_kamar2')->nullable();
            $table->string('gbr_kamar3')->nullable();
            $table->string('polygon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_villa');
    }
};
