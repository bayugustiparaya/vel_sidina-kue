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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->foreignId('keluarga_id')->nullable()->constrained('penduduk_keluargas')->cascadeOnUpdate()->nullOnDelete();
            $table->string('name');
            $table->foreignId('jekel_id')->nullable()->constrained('pdk_jekels')->cascadeOnUpdate()->nullOnDelete();
            $table->string('tpt_lahir');
            $table->date('tgl_lahir');
            $table->foreignId('agama_id')->nullable()->constrained('pdk_agamas')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('pendidikan_id')->nullable()->constrained('pdk_pendidikans')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('pekerjaan_id')->nullable()->constrained('pdk_pekerjaans')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('darah_id')->nullable()->constrained('pdk_darahs')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('kawin_id')->nullable()->constrained('pdk_kawins')->cascadeOnUpdate()->nullOnDelete();
            $table->date('tgl_perkawinan')->nullable();
            $table->foreignId('hubungan_id')->nullable()->constrained('pdk_hubungans')->cascadeOnUpdate()->nullOnDelete(); // kk-level
            $table->foreignId('warganegara_id')->nullable()->constrained('pdk_warganegaras')->cascadeOnUpdate()->nullOnDelete();
            $table->string('no_paspor')->nullable();
            $table->string('no_kitap')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
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
        Schema::dropIfExists('penduduks');
    }
};
