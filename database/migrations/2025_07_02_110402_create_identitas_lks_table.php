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
    Schema::create('identitas_lks', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lks');
        $table->string('domisili');
        $table->string('provinsi');
        $table->string('kab_kota');
        $table->string('nama_pengisi');
        $table->string('jabatan');
        $table->string('telepon_pengisi')->nullable();
        $table->string('email')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identitas_lks');
    }
};
