<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::create('jejaring_lks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identitas_lks_id')->constrained()->onDelete('cascade');
            $table->string('kategori'); // sosial, perguruan tinggi, usaha, pemerintah
            $table->string('asal'); // dalam, luar
            $table->string('nama_lembaga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jejaring_lks');
    }
};
