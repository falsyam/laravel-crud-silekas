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
    Schema::create('pengurus_lks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('identitas_lks_id')->constrained('identitas_lks')->onDelete('cascade');
        $table->string('nama_ketua');
        $table->string('telepon_ketua');
        $table->string('alamat_ketua');
        $table->string('nama_sekretaris');
        $table->string('telepon_sekretaris');
        $table->string('alamat_sekretaris');
        $table->string('nama_bendahara');
        $table->string('telepon_bendahara');
        $table->string('alamat_bendahara');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_lks');
    }
};
