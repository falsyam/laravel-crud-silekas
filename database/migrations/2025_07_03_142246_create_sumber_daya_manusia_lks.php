<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sumber_daya_manusia_lks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identitas_lks_id')->constrained()->onDelete('cascade');
            $table->integer('jumlah_pembina')->nullable();
            $table->integer('jumlah_pengurus')->nullable();
            $table->integer('jumlah_pengawas')->nullable();
            $table->string('keterangan_lainnya')->nullable();
            $table->integer('jumlah_lainnya')->nullable();
            $table->integer('jumlah_pekerja_sosial')->nullable();
            $table->integer('jumlah_teknis_lainnya')->nullable();
            $table->integer('jumlah_administrasi')->nullable();
            $table->integer('jumlah_penunjang')->nullable();
            $table->string('keterangan_pelaksana_lainnya')->nullable();
            $table->integer('jumlah_pelaksana_lainnya')->nullable();
            $table->string('modal_awal')->nullable();
            $table->string('iuran_anggota')->nullable();
            $table->string('hasil_usaha')->nullable();
            $table->string('donatur')->nullable();
            $table->string('dunia_usaha')->nullable();
            $table->string('zakat')->nullable();
            $table->string('bantuan_lembaga')->nullable();
            $table->string('bantuan_usaha')->nullable();
            $table->string('bantuan_pemerintah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_daya_manusia_lks');
    }
};
