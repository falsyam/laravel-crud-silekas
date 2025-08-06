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
        Schema::create('sumber_daya_lks', function (Blueprint $table) {
    $table->id();
    $table->foreignId('identitas_lks_id')->constrained()->onDelete('cascade');
    $table->string('prasarana_bangunan_kantor')->nullable();
    $table->string('status_bangunan_kantor')->nullable();
    $table->string('status_bangunan_kantor_lain')->nullable();
    $table->string('papan_nama')->nullable();
    $table->string('papan_data')->nullable();
    $table->string('perlengkapan_kantor')->nullable();
    $table->string('ruang_konseling')->nullable();
    $table->string('ruang_diagnosa')->nullable();
    $table->string('ruang_teknis_lainnya')->nullable();
    $table->string('ruang_makan')->nullable();
    $table->string('ruang_kesehatan')->nullable();
    $table->string('ruang_umum_lainnya')->nullable();
    $table->string('peralatan_komunikasi')->nullable();
    $table->string('instalasi_listrik')->nullable();
    $table->string('sarana_penunjang_lainnya')->nullable();
    $table->string('mobil')->nullable();
    $table->string('motor')->nullable();
    $table->string('transportasi_lainnya')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_daya_lks');
    }
};
