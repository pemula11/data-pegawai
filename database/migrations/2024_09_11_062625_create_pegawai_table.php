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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50)->required();
            $table->string('alamat', 100)->required();
            $table->date('tanggal_lahir')->default('2000-01-01');
            $table->boolean('jenis_kelamin', 1);
            $table->unsignedBigInteger('id_golongan')->nullable();
            $table->foreign('id_golongan')->references('id')->on('golongan')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
