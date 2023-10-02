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
        Schema::create('penduduk_keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kk')->unique();
            $table->text('alamat')->nullable();
            $table->tinyText('rt', 10)->nullable();
            $table->tinyText('rw', 10)->nullable();
            $table->integer('kode_pos')->nullable();
            $table->foreignId('provinsi_id')->nullable()->constrained('wil_provinces')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('kota_id')->nullable()->constrained('wil_regencies')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('kecamatan_id')->nullable()->constrained('wil_districts')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('kelurahan_id')->nullable()->constrained('wil_villages')->cascadeOnUpdate()->nullOnDelete();
            $table->date('tgl_cetak')->nullable();
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
        Schema::dropIfExists('penduduk_keluargas');
    }
};
