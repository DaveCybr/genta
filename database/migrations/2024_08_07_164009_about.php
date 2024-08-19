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
        Schema::create('tbl_about', function (Blueprint $table) {
            $table->id('id_about');
            $table->string('judul');
            $table->string('paragraf');
            $table->string('daftar_poin1')->nullable();
            $table->string('daftar_poin2')->nullable();
            $table->string('daftar_poin3')->nullable();
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_about');
    }
};
