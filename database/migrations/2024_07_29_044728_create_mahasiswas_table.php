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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('npm')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();            
        });

        Schema::create('khs', function(Blueprint $table){            
            $table->string('no_khs')->primary();
            $table->string('npm');
            $table->string('kode_matakuliah');
            $table->string('nilai');
        });

        Schema::create('krs', function(Blueprint $table){
            $table->string('no_krs')->primary();
            $table->string('no_khs');
            $table->string('npm');
            $table->string('tahun_akademik');
            $table->string('semester');
            $table->string('perkuliahan');
        });
        
        Schema::create('matakuliah', function(Blueprint $table){            
            $table->string('kode_matakuliah')->primary();
            $table->string('nama');
            $table->string('sks');
            $table->string('id_dosen');
            $table->string('id_program_studi');
        });
        
        Schema::create('program_studi', function(Blueprint $table){            
            $table->string('id_program_studi')->primary();
            $table->string('nama_program_studi');
            $table->string('fakultas');                    
        });

        Schema::create('dosen', function(Blueprint $table){            
            $table->string('id_dosen')->primary();
            $table->string('nama_dosen');
            $table->string('alamat');
            $table->string('tanggal_lahir');
            $table->string('email');
            $table->string('telepon');          
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::table('khs', function($table){
            $table->foreign('npm')
                ->references('npm')
                ->on('mahasiswa')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
            $table->foreign('kode_matakuliah')
                ->references('kode_matakuliah')
                ->on('matakuliah')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
        });
        
        Schema::table('krs', function($table){
            $table->foreign('npm')
                ->references('npm')
                ->on('mahasiswa')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
            $table->foreign('no_khs')
                ->references('no_khs')
                ->on('khs')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
        });
        
        Schema::table('matakuliah', function($table){            
            $table->foreign('id_program_studi')
                ->references('id_program_studi')
                ->on('program_studi')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
            $table->foreign('id_dosen')
                ->references('id_dosen')
                ->on('dosen')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {           
        Schema::table('krs',function(Blueprint $table){
            $table->dropForeign(['npm']);
            $table->dropForeign(['no_khs']);
            $table->drop('krs');
        });

        Schema::table('khs',function(Blueprint $table){
            $table->dropForeign(['npm']);
            $table->dropForeign(['kode_matakuliah']);
            $table->drop('khs');
        });
        
        Schema::table('matakuliah',function(Blueprint $table){
            $table->dropForeign(['id_program_studi']);
            $table->dropForeign(['id_dosen']);
            $table->drop('matakuliah');
        });
        Schema::dropIfExists('mahasiswa');
        Schema::dropIfExists('program_studi');
        Schema::dropIfExists('dosen');
        Schema::dropIfExists('sessions');
    }
};
