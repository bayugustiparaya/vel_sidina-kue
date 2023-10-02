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
        Schema::create('surat_permohonans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_jenis_id')->nullable()->constrained('surat_jenis')->cascadeOnUpdate()->nullOnDelete();
            $table->string('nomor_surat'); // nf_singkatan+angkaacak
            $table->foreignId('pemohon_id')->nullable()->constrained('penduduks')->nullable()->cascadeOnUpdate()->nullOnDelete();
            $table->text('isian_form')->nullable();
            $table->string('status')->default('Menunggu Diperiksa');
            $table->string('alasan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('hp_aktif');
            $table->text('syarat')->nullable();
            $table->boolean('is_ttd')->default(false);
            $table->timestamp('permohonan_at');
            $table->timestamp('checked_at')->nullable();
            $table->timestamp('finished_at')->nullable(); // ditolak / siap didownload
            $table->timestamp('download_at')->nullable(); // didownload
            $table->foreignId('checked_by')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('approved_by')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('surat_permohonans');
    }
};
