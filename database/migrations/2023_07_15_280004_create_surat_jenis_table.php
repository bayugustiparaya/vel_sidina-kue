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
        Schema::create('surat_jenis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nf_singkatan');
            $table->string('nf_wilayah');
            $table->string('nf_romawi');
            $table->text('master_template')->nullable();
            $table->text('custom_template')->nullable();
            $table->text('form_isian')->nullable();
            $table->text('kode_isian')->nullable();
            $table->text('syarat')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_available')->default(false);
            $table->text('ikon')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('surat_jenis');
    }
};
