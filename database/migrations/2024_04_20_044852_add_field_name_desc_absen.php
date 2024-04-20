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
        Schema::table('tugas_results', function (Blueprint $table) {
            $table->string('no_absen')->nullable()->after('tugas_id');
            $table->string('name')->nullable()->after('no_absen');
            $table->text('deskripsi')->nullable()->after('name');
            $table->integer('nilai')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tugas_results', function (Blueprint $table) {
            $table->dropColumn('no_absen');
            $table->dropColumn('name');
            $table->dropColumn('deskripsi');
            $table->dropColumn('nilai');
        });
    }
};
