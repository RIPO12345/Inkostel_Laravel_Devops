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
        Schema::create('validation', function (Blueprint $table) {
            $table->bigIncrements('id_kos');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_kos');
            $table->string('harga_kos_pertahun');
            $table->string('harga_kos_perbulan')->nullable();
            $table->string('jarak_kos');
            $table->string('gambar_kos1');
            $table->string('gambar_kos2')->nullable();
            $table->string('gambar_kos3')->nullable();
            $table->string('gambar_kos4')->nullable();
            $table->string('gambar_kos5')->nullable();
            $table->string('alamat');
            $table->string('Deskripsi');
            $table->string('Fasilitas')->nullable();
            $table->string('ContactPerson');
            $table->integer('KamarKosong')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validation');
    }
};
