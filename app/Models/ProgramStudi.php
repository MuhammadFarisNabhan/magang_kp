<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $_table = 'program_studi';
    protected $_fillable = [
        'id_program_studi',
        'nama_program_studi',    
        'fakultas'
    ];

    protected $_timestamps = false;
    
}
