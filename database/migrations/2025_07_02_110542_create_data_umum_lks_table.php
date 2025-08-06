<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('data_umum_lks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('identitas_lks_id')->constrained('identitas_lks')->onDelete('cascade');
        $table->string('nama_lks');
        $table->string('singkatan');
        $table->string('alamat_lks');
        $table->string('jalan_nomor');
        $table->string('desa_kelurahan');
        $table->string('kecamatan');
        $table->string('kota');
        $table->string('provinsi');
        $table->string('kodepos');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_umum_lks');
    }
};
