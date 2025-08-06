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
    Schema::create('pendirian_lks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('identitas_lks_id')->constrained('identitas_lks')->onDelete('cascade');
        $table->string('tempat_didirikan');
        $table->tinyInteger('tanggal');
        $table->string('bulan');
        $table->year('tahun');
        $table->string('nomor_akta');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendirian_lks');
    }
};
