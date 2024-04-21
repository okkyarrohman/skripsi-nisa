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
            $table->unsignedBigInteger('sub_tugas_id')->nullable()->after('answer');
            $table->foreign('sub_tugas_id')->references('id')->on('sub_tugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tugas_results', function (Blueprint $table) {
            $table->dropForeign(['sub_tugas_id']);
            $table->dropColumn('sub_tugas_id');
        });
    }
};
