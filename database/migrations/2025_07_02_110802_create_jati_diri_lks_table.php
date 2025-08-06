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
    Schema::create('jati_diri_lks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('identitas_lks_id')->constrained('identitas_lks')->onDelete('cascade');
        $table->text('visi_lks')->nullable();
        $table->text('misi_lks')->nullable();
        $table->text('tujuan_lks')->nullable();
        $table->string('status_lks')->nullable();
        $table->string('lingkup_kerja')->nullable();
        $table->string('sifat_pelayanan')->nullable();
        $table->string('posisi_lks')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jati_diri_lks');
    }
};
