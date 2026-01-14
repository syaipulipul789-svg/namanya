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
        Schema::create('laporan_wargas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi_laporan');
            $table->string('kategori');
            $table->string('nama_pelapor');
            $table->string('no_hp');
            $table->string('bukti')->nullable();
            $table->enum('status', ['proses', 'selesai','ditolak'])->default('proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_wargas');
    }
};
