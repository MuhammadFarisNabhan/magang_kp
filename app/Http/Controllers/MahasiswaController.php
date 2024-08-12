<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index_dashboard(){     
        // $mahasiswa = Mahasiswa::all(['nama','npm']);
        $mahasiswa = DB::table('mahasiswa')->select('nama', 'npm')->get();

        return view('dashboard', ['title' => 'Dashboard'], ['mahasiswa' => $mahasiswa]);
    }
}
