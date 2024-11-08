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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('npm')->unique();
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->string('telepon')->nullable();
        //     $table->text('alamat')->nullable();
        //     $table->string('image')->nullable();
        //     $table->string('id_program_studi');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });

        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });

        // Schema::create('sessions', function (Blueprint $table) {
        //     $table->string('id')->primary();
        //     $table->foreignId('user_id')->nullable()->index();
        //     $table->string('ip_address', 45)->nullable();
        //     $table->text('user_agent')->nullable();
        //     $table->longText('payload');
        //     $table->integer('last_activity')->index();
        // });
        // Schema::table('users', function($table){
        //     $table->foreign('id_program_studi')
        //         ->references('id_program_studi')
        //         ->on('matakuliah')
        //         ->onDelete('CASCADE')->onUpdate('CASCADE'); 
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('users',function(Blueprint $table){
        //     $table->dropForeign(['id_program_studi']);            
        //     $table->drop('users');
        // });
        // // Schema::dropIfExists('users');
        // Schema::dropIfExists('password_reset_tokens');
        // Schema::dropIfExists('sessions');
    }
};
