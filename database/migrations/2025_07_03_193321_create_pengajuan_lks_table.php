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
        Schema::create('pengajuan_lks', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('identitas_lks_id');
    $table->enum('tipe_pengajuan', ['Pendaftaran LKS','Perpanjangan Surat Tanda Daftar']);
    $table->string('kode_unik')->unique();
    $table->enum('status', ['menunggu', 'terverifikasi', 'ditolak'])->default('menunggu');
    $table->text('catatan')->nullable();
    $table->timestamp('tanggal_pengajuan')->nullable();
    $table->timestamps();
    

    $table->foreign('identitas_lks_id')->references('id')->on('identitas_lks')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_lks');
    }
};
