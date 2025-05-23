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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->string('nidn')->nullable();
            $table->string('nama');
            $table->string('jabatan_fungsional')->nullable();
            $table->unsignedBigInteger('jabatan_id')->nullable();
            $table->unsignedBigInteger('program_studi_id')->nullable();
            $table->string('handphone')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->cascadeOnDelete();
$table->foreign('program_studi_id')->references('id')->on('program_studi')->cascadeOnDelete();
$table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
