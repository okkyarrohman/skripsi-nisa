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
        Schema::create('kelompok_murids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelompok_id')->nullable();
            $table->foreign('kelompok_id')->references('id')->on('kelompoks')->onDelete('cascade');
            $table->unsignedBigInteger('murid_id')->nullable();
            $table->foreign('murid_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_murids');
    }
};
