<?php

use App\Http\Controllers\Auths;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KRS;


// ==========================================================================================================================
// Login
Route::get('/login',[Auths::class,'index_login'])->name('login');
Route::post('/login',[Auths::class,'login'])->name('login');

// SignUp
Route::post('/signup',[Auths::class,'signup'],)->name('signup');

// Logout
Route::get('/logout', [Auths::class,'logout'])->name('logout');
// ==========================================================================================================================



// ==========================================================================================================================
// All Fiture
Route::get('/', [MahasiswaController::class,'index_dashboard'])->name('dashboard')->middleware('auth');

Route::get('/data-transkrip',[MahasiswaController::class,'data_transkrip'])->name('dataTranskrip')->middleware('auth');

Route::get('/history-nilai', function(){
    return view('historyNilai', ['title' => 'History Nilai']);
})->middleware('auth');
 
Route::get('/jadwal-pribadi', function(){
    return view('jadwalPribadi', ['title' => 'Jadwal Pribadi']);
})->middleware('auth');



// ==========================================================================================================================
// KRS
Route::get('/mengisi-krs', [KRS::class, 'mengisiKRS'])->name('mengisiKRS')->middleware('auth');
Route::post('/ambil-jadwal', [KRS::class, 'ambilJadwal'])->name('ambilJadwal')->middleware('auth');
Route::post('/hapus-jadwal', [KRS::class, 'hapusJadwal'])->name('hapusJadwal')->middleware('auth');
Route::post('/simpan-krs', [KRS::class, 'simpanKRS'])->name('simpanKRS')->middleware('auth');

Route::get('/cetak-krs-kpu',[KRS::class,"cetakKrsKpu"])->name("cetakKrsKpu")->middleware('auth');

// ==========================================================================================================================
Route::get('/jadwal-PA', function(){
    return view('jadwalPA', ['title' => 'Jadwal PA']);
})->middleware('auth');
 
Route::get('/berita-acara-PA', [MahasiswaController::class,'beritaAcaraPA'])->name('beritaAcaraPA')->middleware('auth');
 
Route::get('/data-pribadi', [MahasiswaController::class,'data_pribadi'])->name('dataPribadi')->middleware('auth');
Route::post('/update-data-pribadi',[MahasiswaController::class, 'update_data_pribadi'])->name('updateDataPribadi')->middleware('auth');
 
Route::get('/kuesioner-dosen', [MahasiswaController::class,'kuesionerDosen'])->name('kuesionerDosen')->middleware('auth');
 
Route::get('/kuesioner-kepuasan', function(){
    return view('kuesionerKepuasan', ['title' => 'Kuesioner Kepuasan']);
})->middleware('auth');
 
Route::get("/kehadiran-kuliah", [MahasiswaController::class,'kehadiranKuliah'])->name('kehadiranKuliah')->middleware('auth');
 
Route::get('/rencana-pembelajaran-semester',[MahasiswaController::class,'rps'])->name('rps')->middleware('auth');
 
Route::get('/nilai-semester-aktif', [MahasiswaController::class,'nilai_semester_aktif'])->name('nilaiSemesterAktif')->middleware('auth');
 
Route::get('/keuangan', function(){
    return view('keuangan', ['title' => 'Keuangan']);
});
 