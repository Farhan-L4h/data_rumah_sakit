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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama_pasien');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->integer('no_tlpn');
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('id_dokter');
            $table->timestamps();

            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
