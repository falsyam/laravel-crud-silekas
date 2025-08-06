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
    Schema::create('kontak_lks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('identitas_lks_id')->constrained('identitas_lks')->onDelete('cascade');
        $table->string('telepon')->nullable();
        $table->string('fax')->nullable();
        $table->string('email')->nullable();
        $table->string('website')->nullable();
        $table->string('media_sosial')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak_lks');
    }
};
