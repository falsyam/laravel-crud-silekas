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
       Schema::create('program_lks', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('identitas_lks_id');

    $table->string('sasaran_perseorangan')->nullable();
    $table->string('sasaran_keluarga')->nullable();
    $table->string('sasaran_kelompok')->nullable();
    $table->string('sasaran_masyarakat')->nullable();

    $table->string('masalah_kemiskinan')->nullable();
    $table->string('masalah_ketelantaran')->nullable();
    $table->string('masalah_disabilitas')->nullable();
    $table->string('masalah_keterpencilan')->nullable();
    $table->string('masalah_tunakepribadian')->nullable();
    $table->string('masalah_bencana')->nullable();
    $table->string('masalah_kekerasan')->nullable();
    $table->string('masalah_lainnya')->nullable();

    $table->string('rehabilitasi_sosial')->nullable();
    $table->string('pemberdayaan_sosial')->nullable();
    $table->string('perlindungan_sosial')->nullable();
    $table->string('jaminan_sosial')->nullable();

    $table->string('pelayanan_pendidikan')->nullable();
    $table->string('detail_pelayanan_pendidikan')->nullable();
    $table->string('pelayanan_kesehatan')->nullable();
    $table->string('detail_pelayanan_kesehatan')->nullable();
    $table->string('pelayanan_keagamaan')->nullable();
    $table->string('detail_pelayanan_keagamaan')->nullable();
    $table->string('layanan_lainnya')->nullable();

    $table->string('dalam_lembaga')->nullable();
    $table->string('luar_lembaga')->nullable();
    $table->string('sistem_lainnya')->nullable();

    $table->string('lokasi_pelayanan')->nullable();
    $table->string('detail_lokasi_pelayanan')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
