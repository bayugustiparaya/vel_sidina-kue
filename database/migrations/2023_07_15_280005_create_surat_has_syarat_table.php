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
        Schema::create('surat_has_syarat', function (Blueprint $table) {
            $table->primary(['surat_jenis_id', 'surat_syarat_id']);
            $table->foreignId('surat_jenis_id')->nullable()->constrained('surat_jenis')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('surat_syarat_id')->nullable()->constrained('surat_syarats')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('surat_has_syarat');
    }
};
