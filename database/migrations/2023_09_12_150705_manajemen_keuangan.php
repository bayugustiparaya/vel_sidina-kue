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
        //
        Schema::create('bidang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('sub_bidang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('bidang_id');
            $table->timestamps();

            $table->foreign('bidang_id')
                ->references('id')
                ->on('bidang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('sumber_anggaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('pagu_anggaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pagu_anggaran');
            $table->unsignedBigInteger('bidang_id');
            $table->unsignedBigInteger('sub_bidang_id');
            $table->timestamps();

            $table->foreign('bidang_id')
                ->references('id')
                ->on('bidang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('sub_bidang_id')
                ->references('id')
                ->on('sub_bidang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('pmk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('bidang_id');
            $table->unsignedBigInteger('sub_bidang_id');
            $table->unsignedBigInteger('sumber_anggaran_id');
            $table->unsignedBigInteger('pagu_anggaran_id');
            $table->timestamps();

            $table->foreign('bidang_id')
                ->references('id')
                ->on('bidang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('sub_bidang_id')
                ->references('id')
                ->on('sub_bidang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('sumber_anggaran_id')
                ->references('id')
                ->on('sumber_anggaran')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('pagu_anggaran_id')
                ->references('id')
                ->on('pagu_anggaran')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('pmk_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->unsignedBigInteger('spp_id');
            $table->timestamps();
        });

        Schema::create('spp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('nama_kegiatan');
            $table->integer('tahun');
            $table->unsignedBigInteger('pmk_status_id');
            $table->unsignedBigInteger('bidang_id');
            $table->unsignedBigInteger('sub_bidang_id');
            $table->timestamps();

            $table->foreign('pmk_status_id')
                ->references('id')
                ->on('pmk_status')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('bidang_id')
                ->references('id')
                ->on('bidang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('sub_bidang_id')
                ->references('id')
                ->on('sub_bidang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('SppKeperluan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('spp_id');
            $table->string('keperluan');
            $table->integer('jumlah_pengambilan');
            $table->timestamps();
            $table->foreign('spp_id')
                    ->references('id')
                    ->on('spp')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('bidang');
        Schema::dropIfExists('sub_bidang');
        Schema::dropIfExists('sumber_anggaran');
        Schema::dropIfExists('pagu_anggaran');
        Schema::dropIfExists('pmk');
        Schema::dropIfExists('pmk_status');
        Schema::dropIfExists('spp');
        Schema::dropIfExists('SppKeperluan');
    }
};
