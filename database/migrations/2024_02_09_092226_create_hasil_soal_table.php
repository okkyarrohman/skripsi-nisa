<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Hasil;
use App\Models\Soal;
use App\Models\Opsi;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasil_soal', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Hasil::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Soal::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Opsi::class)->nullable()->constrained()->cascadeOnDelete();
            $table->integer('point');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_soal');
    }
};
