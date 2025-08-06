<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('sumber_dana_lain_lks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identitas_lks_id')->constrained()->onDelete('cascade');
            $table->string('sumber_dana');
            $table->string('asal_dana'); // Dalam Negeri, Luar Negeri, Keduanya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_dana_lain_lks');
    }
};
