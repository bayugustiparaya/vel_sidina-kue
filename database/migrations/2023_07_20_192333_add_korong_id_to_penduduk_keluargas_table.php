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
            $table->foreignId('korongs_id')->nullable()->after('kelurahan_id')->constrained('korongs')->cascadeOnUpdate()->nullOnDelete();
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
