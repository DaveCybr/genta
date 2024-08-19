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
        Schema::create('tbl_about2', function (Blueprint $table) {
            $table->id('id_about2');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('daftar_poin1')->nullable();
            $table->string('daftar_poin2')->nullable();
            $table->string('daftar_poin3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_about2');
    }
};
