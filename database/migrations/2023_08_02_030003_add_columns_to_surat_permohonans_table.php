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
        Schema::table('surat_permohonans', function (Blueprint $table) {
            $table->string('alasan_ditolak')->nullable()->after('alasan');
            $table->timestamp('rejected_at')->nullable()->after('download_at');
            $table->timestamp('updated_at')->nullable()->after('rejected_at');
            $table->foreignId('rejected_by')->nullable()->after('approved_by')->constrained('users')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('surat_permohonans', function (Blueprint $table) {
            //
        });
    }
};
