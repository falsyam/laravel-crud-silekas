<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();

            // Foreign key ke tabel pengajuan_lks
            $table->foreignId('pengajuan_lks_id')->constrained('pengajuan_lks')->onDelete('cascade');

            // Data surat
            $table->string('nomor_surat')->unique();
            $table->date('tanggal_penerbitan');
            $table->string('bulan_penerbitan')->nullable();  // Misal: "Juli"
            $table->year('tahun_penerbitan')->nullable();    // Misal: 2025
            $table->date('masa_berlaku')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};