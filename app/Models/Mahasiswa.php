<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas'; // Table name should be 'mahasiswas'

    protected $fillable = [
        'npm',
        'nik',
        'nama',
        'id_program_studi',
        'email',
        'password',
        'telephon',
        'alamat',
        'image',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
