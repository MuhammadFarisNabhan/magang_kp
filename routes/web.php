<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('auth');
});

Route::get('/dashboard',function(){
    return view('dashboard', ['title' => 'Dashboard']);
});

Route::get('/data-transkrip',function(){
    return view('dataTranskrip', ['title' => 'Data Transkrip']);
});

Route::get('/history-nilai', function(){
    return view('historyNilai', ['title' => 'History Nilai']);
});
 
Route::get('/jadwal-pribadi', function(){
    return view('jadwalPribadi', ['title' => 'Jadwal Pribadi']);
});
 
Route::get('/mengisi-krs', function(){
    return view('mengisiKRS', ['title' => 'Mengisi KRS']);
});
 
Route::get('/jadwal-PA', function(){
    return view('jadwalPA', ['title' => 'Jadwal PA']);
});
 
Route::get('/berita-acara-PA', function(){
    return view('beritaAcaraPA', ['title' => 'Berita Acara PA']);
});
 
Route::get('/cetak-krs-kpu', function(){
    return view('cetakKRS_KPU', ['title' => 'Cetak KRS atau KPU']);
});
 
Route::get('/data-pribadi', function(){
    return view('dataPribadi', ['title' => 'Data Pribadi']);
});
 
Route::get('/kuesioner-dosen', function(){
    return view('kuesionerDosen', ['title' => 'Kuesioner Dosen']);
});
 
Route::get('/kuesioner-kepuasan', function(){
    return view('kuesionerKepuasan', ['title' => 'Kuesioner Kepuasan']);
});
 
Route::get('/kehadiran-kuliah', function(){
    return view('kehadiranKuliah', ['title' => 'Kehadiran Kuliah']);
});
 
Route::get('/rencana-pembelajaran-semester', function(){
    return view('rencanaPembelajaran', ['title' => 'Rencana Pembelajaran Semester']);
});
 
Route::get('/nilai-semester-aktif', function(){
    return view('nilaiSemesterAktif', ['title' => 'Nilai Semester Aktif']);
});
 
Route::get('/keuangan', function(){
    return view('keuangan', ['title' => 'Keuangan']);
});
 