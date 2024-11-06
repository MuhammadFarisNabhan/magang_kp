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
        // Schema::create('mahasiswa', function (Blueprint $table) {
        //     $table->string('npm')->primary();
        //     $table->string('nama');
        //     $table->string('email')->unique();
        //     $table->string('password');
        //     $table->string('telepon')->nullable();
        //     $table->text('alamat')->nullable();
        //     $table->string('image')->nullable();
        //     $table->timestamps();            
        // });

        Schema::create('users', function (Blueprint $table) {
            $table->string('id',512)->primary();
            $table->string('name',512);
            $table->string('nik',512);
            $table->string('npm',512)->unique();
            $table->string('email',512)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',512);
            $table->string('telepon',512)->nullable();
            $table->text('alamat',512)->nullable();
            $table->string('image',512)->nullable();
            $table->string('id_program_studi',512)->nullable();     
            $table->string('id_dosen',512)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email',512)->primary();
            $table->string('token',512);
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id',512)->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('khs', function(Blueprint $table){            
            $table->string('no_khs',512)->primary();
            $table->string('no_krs',512);
            $table->string('npm',512);
            $table->string('nilai',512);
        });
        
        Schema::create('krs', function(Blueprint $table){            
            $table->string('no_krs',512)->primary();            
            $table->string('kode_matakuliah',512);
            $table->string('id_penilaian',512)->nullable();      
            $table->string('no_absen',512)->nullable();      
            $table->string('npm',512);
            $table->string('tahun_akademik',512)->nullable();
            $table->string('semester',512)->nullable();
            $table->string('perkuliahan',512)->nullable();    
            $table->enum('status', ['berjalan','selesai','diambil'])->default('diambil');
        });

        Schema::create('penilaian', function(Blueprint $table){
            $table->string('id_penilaian',512)->primary();
            $table->string('no_krs',512);
            $table->string('sikap',512);
            $table->string('tugas1',512);
            $table->string('tugas2',512);
            $table->string('rataTugas',512);
            $table->string('uts',512);
            $table->string('uas',512); 
            $table->string('total',512); 
            $table->string('huruf',512); 
            $table->string('mutu',512); 
        });
        
        Schema::create('matakuliah', function(Blueprint $table){            
            $table->string('kode_matakuliah',512)->primary();
            $table->string('nama',512);
            $table->string('sks',512);
            $table->string('id_dosen',512)->nullable();
            $table->string('id_program_studi',512);
            $table->string('no_kelas',512)->nullable();
        });
        
        Schema::create('program_studi', function(Blueprint $table){            
            $table->string('id_program_studi',512)->primary();
            $table->string('nama_program_studi',512);
            $table->string('fakultas',512);                    
        });

        Schema::create('dosen', function(Blueprint $table){            
            $table->string('id_dosen',512)->primary();
            $table->string('nama_dosen',512);
            $table->string('alamat',512);
            $table->string('tanggal_lahir',512);
            $table->string('email',512);
            $table->string('telepon',512);          
        });

        Schema::create('absensi', function(Blueprint $table){
            $table->string('no_absen',512)->primary();                        
            $table->string('no_krs',512);
            $table->string('hadir_dosen',512);
            $table->string('hadir',512);
            $table->string('hadir_tanpa_tatap_muka',512);
            $table->string('ijin',512);
        });
        
        Schema::create('kelas', function(Blueprint $table){
            $table->string('no_kelas',512)->primary();                        
            $table->string('kelas',512);
            $table->string('tempat',512);            
            $table->string('waktu',512);            
        });

        Schema::table('khs', function($table){
            $table->foreign('npm')
                ->references('npm')
                ->on('users')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                            
            $table->foreign('no_krs')
                ->references('no_krs')
                ->on('krs')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
        });
        
        Schema::table('krs', function($table){
            $table->foreign('npm')
                ->references('npm')
                ->on('users')
                ->onDelete('CASCADE')->onUpdate('CASCADE'); 
            $table->foreign('kode_matakuliah')
                ->references('kode_matakuliah')
                ->on('matakuliah')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                               
            $table->foreign('no_absen')
                ->references('no_absen')
                ->on('absensi')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                               
            $table->foreign('id_penilaian')
                ->references('id_penilaian')
                ->on('penilaian')
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
            $table->foreign('no_kelas')
                ->references('no_kelas')
                ->on('kelas')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
        });
        
        Schema::table('users', function($table){
            $table->foreign('id_program_studi')
                ->references('id_program_studi')
                ->on('program_studi')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_dosen')
                ->references('id_dosen')
                ->on('dosen')
                ->onDelete('CASCADE')->onUpdate('CASCADE');                
        });

        // Schema::table('penilaian')
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {           
        Schema::table('khs',function(Blueprint $table){
            $table->dropForeign(['npm']);
            $table->dropForeign(['no_krs']);
            $table->drop('khs');
        });

        Schema::table('krs',function(Blueprint $table){
            $table->dropForeign(['npm']);            
            $table->dropForeign(['kode_matakuliah']);
            $table->dropForeign(['no_absen']);
            $table->dropForeign(['id_penilaian']);
            $table->drop('krs');
        });

        Schema::table('matakuliah',function(Blueprint $table){
            $table->dropForeign(['id_program_studi']);
            $table->dropForeign(['id_dosen']);
            $table->dropForeign(['no_kelas']);
            $table->drop('matakuliah');
        });        

        Schema::table('users',function(Blueprint $table){
            $table->dropForeign(['id_program_studi']);            
            $table->dropForeign(['id_dosen']);            
            $table->drop('users');
        });

        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');

        Schema::dropIfExists('absensi');
        Schema::dropIfExists('penilaian');
        Schema::dropIfExists('program_studi');
        Schema::dropIfExists('dosen');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('sessions');
    }
};
