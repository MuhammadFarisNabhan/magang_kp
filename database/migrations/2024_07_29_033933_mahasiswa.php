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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 64);
            $table->string('nama', 64);
            $table->string('email',255);
            $table->string('jurusan', 64);
            $table->string('password',255);            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
