<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MahasiswaController extends Controller
{
    public function index_dashboard(){     
        $userId = DB::table('users')->where('id', Auth::id())->get();
        $programStudi = DB::table('program_studi')->where('id_program_studi',$userId->select('id_program_studi'))->get();

        $mahasiswa = [
            'User'  => $userId,
            'Prodi' => $programStudi,
        ];

        return view('dashboard', ['title' => 'Dashboard'], ['mahasiswa' => $mahasiswa]);
    }

    public function data_transkrip(){
        $userId         = DB::table('users')->where('id', Auth::id())->get();
        // $userKrs        = DB::table('krs')->where('npm',$userId->select('npm'))->get(); 
        // $userTotalMK    = DB::table('khs')->where('npm',$userId->select('npm'))->select()->get();        

        // Get data from table khs, users, krs, and matakuliah
        $userData = DB::table('khs')
        ->join('users','khs.npm','=','users.npm')
        ->join('krs','khs.no_krs','=','krs.no_krs')
        ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
        ->where('khs.npm',$userId->select('npm'))
        ->get();

        // store all mk 
        $totalMkUser = [];

        // Get Total Sks
        $totalSksUser = 0;
        foreach($userData as $ud){            
            $totalSksUser += (int)$ud->sks;            
            array_push($totalMkUser,$ud->nama);
        }

        $data = [            
            'TotalMk'   => [count($totalMkUser)],
            'TotalSks'  => [$totalSksUser],
            'datas'     => $userData,
        ];
        
        return view('dataTranskrip',['title' => 'Data Transkrip'], ['data' => $data]);
    }

    public function data_pribadi(){
        $userId = DB::table('users')->where('id',Auth::id())->get();
        $programStudi = DB::table('program_studi')->where('id_program_studi',$userId->select('id_program_studi'))->get();

        $mahasiswa = [
            $userId, 
            $programStudi,
        ];

        return view('dataPribadi',['title' => 'Data Pribadi'], ['mahasiswa' => $mahasiswa]);

    }

    public function update_data_pribadi(Request $request){
        $validator = Validator::make($request->all(),[
            'alamat'    => 'required',
            'hp'        => 'required',
            'email'     => 'required',
            'nik'       => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $validatedData = $validator->validated(); 

        $user = DB::table('users')->update([
            'alamat'    =>  $validatedData['alamat'],
            'telepon'   =>  $validatedData['hp'],
            'email'     =>  $validatedData['email'],
            'nik'       =>  $validatedData['nik'],
        ]);

        if($user){
            return redirect('/data-pribadi')->with(['success' => 'Berhasil update data..']);
        } else {
            return redirect()->refresh()->withErrors(['error' => 'Gagal update data..']);
        }
    }

    public function kuesionerDosen(){
        $userId = DB::table('users')->where('id', Auth::id())->get();
        $userKrs = DB::table('krs')->where('npm',$userId->select('npm'))->first();

        $data = [
            'user' => $userId,
            'userKrs' => [$userKrs],
        ];

        return view('kuesionerDosen',['title' => 'Kuesioner Dosen'], ['data' => $data]);
    }

    public function cetakKrsKpu(){
        $userId     = DB::table('users')->where('id', Auth::id())->get();
        $userKrs    = DB::table('krs')->where('npm',$userId->select('npm'))->get();

        $data = [
            'Krs' => $userKrs
        ];

        return view('cetakKRS_KPU',['title' => 'Cetak KRS atau KPU'],['data' => $data]);
    }

    public function rps(){
        $userId     = DB::table('users')->where('id', Auth::id())->get();
        $userKrs    = DB::table('krs')->where('npm',$userId->select('npm'))->get();

        $userData = DB::table('krs')
        ->join('users','krs.npm','=','users.npm')
        ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')        
        ->get();

        // dd($userData);

        $data = [
            // 'Krs'   => [ $userKrs[0]],
            'Krs'   => [ ],
            'Matkul'=> $userData,
        ];

        return view('rencanaPembelajaran',['title' => 'Rencana Pembelajaran Semester'],['data'=> $data]);
    }

    public function nilai_semester_aktif(){
        $userId     = DB::table('users')->where('id', Auth::id())->get();
        $userKrs    = DB::table('krs')->where('npm',$userId->select('npm'))->get();        
        
        $userMatkul = DB::table('krs')
        ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
        ->where('krs.npm',$userId->select('npm'))->get();

        $userJoinTable = DB::table('krs')
        ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
        ->where('krs.npm',$userId->select('npm'))->first();

        // dd($userMatkul, $userJoinTable);

        $data = [
            'dataKrs'   =>  $userMatkul,
            'dataMatkul'=>  [$userJoinTable],
        ];

        return view('nilaiSemesterAktif',['title' => 'Nilai Semester Aktif'], ['data' => $data]);
    }

    public function beritaAcaraPA(){
        $userId     = DB::table('users')->where('id', Auth::id())->get();
        $userData   = DB::table('krs')
        ->join('users','krs.npm','=','users.npm')
        ->where('krs.npm', $userId->select('npm'))->get();

        return view('beritaAcaraPA',['title'=>'Berita Acara PA'],['data'=>$userData]);
    }

    public function kehadiranKuliah(){
        $userId     = DB::table('users')->where('id', Auth::id())->get();
        $userData   = DB::table('krs');

        return view('kehadiranKuliah', ['title'=>'Kehadiran Kuliah']);
    }
}
