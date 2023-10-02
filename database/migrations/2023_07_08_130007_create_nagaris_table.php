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
        Schema::create('nagaris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provinsi_id')->nullable()->constrained('wil_provinces')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('kota_id')->nullable()->constrained('wil_regencies')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('kecamatan_id')->nullable()->constrained('wil_districts')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('kelurahan_id')->nullable()->constrained('wil_villages')->cascadeOnUpdate()->nullOnDelete();
            $table->string('name');
            $table->text('alamat_kantor');
            $table->integer('kode_pos');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('batas_utara')->nullable();
            $table->string('batas_selatan')->nullable();
            $table->string('batas_barat')->nullable();
            $table->string('batas_timur')->nullable();
            $table->string('komoditas_unggulan_luas_tanam')->nullable();
            $table->string('komoditas_unggulan_nilai_ekonomi')->nullable();
            $table->decimal('luas_sawah', 10, 3)->default(0)->nullable();
            $table->decimal('luas_tanah_kering', 10, 3)->default(0)->nullable();
            $table->decimal('luas_tanah_basah', 10, 3)->default(0)->nullable();
            $table->decimal('luas_perkebunan', 10, 3)->default(0)->nullable();
            $table->decimal('luas_fasilitas_umum', 10, 3)->default(0)->nullable();
            $table->decimal('luas_hutan', 10, 3)->default(0)->nullable();
            $table->decimal('jarak_ke_provinsi', 10, 3)->default(0)->nullable();
            $table->decimal('jarak_ke_kabupaten', 10, 3)->default(0)->nullable();
            $table->decimal('jarak_ke_kecamatan', 10, 3)->default(0)->nullable();
            $table->text('logo')->nullable();
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
        Schema::dropIfExists('nagaris');
    }
};
