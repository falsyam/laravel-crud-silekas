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
        Schema::create('legalitas_lks', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('identitas_lks_id');

    $table->string('anggaran_dasar')->nullable();
    $table->string('anggaran_rt')->nullable();
    $table->string('akta_pendirian')->nullable();
    $table->string('akta_pendirian_lks_tidak')->nullable();
    $table->string('nama_notaris_tidak')->nullable();
    $table->string('nomor_akta_tidak')->nullable();
    $table->string('nomor_surat_keterangan_terdaftar')->nullable();
    $table->string('akta_pendirian_lks_berbadan')->nullable();
    $table->string('nama_notaris_berbadan')->nullable();
    $table->string('nomor_akta_berbadan')->nullable();
    $table->string('pengesahan_akta_pendirian')->nullable();
    $table->string('nomor_pengesahan')->nullable();
    $table->string('lembaran_negara')->nullable();
    $table->string('nomor_lembaran_negara')->nullable();
    $table->string('ket_domisili')->nullable();
    $table->string('sumber_ket_domisili')->nullable();
    $table->string('tanda_pendaftaran')->nullable();
    $table->string('nama_instansi')->nullable();
    $table->string('nomor_tanda_pendaftaran')->nullable();
    $table->string('npwp')->nullable();
    $table->string('nomor_npwp')->nullable();
    $table->string('rekening')->nullable();
    $table->string('nama_bank')->nullable();
    $table->string('nomor_rekening')->nullable();
    $table->string('nama_rekening')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legalitas_lks');
    }
};
