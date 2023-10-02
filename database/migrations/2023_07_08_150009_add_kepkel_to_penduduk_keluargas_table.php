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
        Schema::table('penduduk_keluargas', function (Blueprint $table) {
            $table->foreignId('kepkel_id')->nullable()->after('nomor_kk')->constrained('penduduks')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penduduk_keluargas', function (Blueprint $table) {
            //
        });
    }
};
