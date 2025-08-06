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
        Schema::create('pelayanan_lks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identitas_lks_id')->constrained()->onDelete('cascade');
            $table->string('kategori_pelayanan');
            $table->string('bentuk_pelayanan');
            $table->integer('jumlah_binaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayanan_lks');
    }
};
