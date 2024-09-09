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
        $userKrs        = DB::table('krs')->where('npm',$userId->select('npm'))->get(); 
        $userTotalMK    = DB::table('khs')->where('npm',$userId->select('npm'))->select()->get();        
        
        $userTotalSks = DB::table('krs')
        ->join('matakuliah', 'krs.kode_matakuliah', '=', 'matakuliah.kode_matakuliah')
        ->where('krs.npm', $userId->select('npm'))
        ->sum('matakuliah.sks');

        $userJoinTable = DB::table('krs')
        ->join('matakuliah', 'krs.kode_matakuliah', '=', 'matakuliah.kode_matakuliah')
        ->join('khs','krs.no_krs','=','khs.no_krs')
        ->where('krs.npm', $userId->select('npm'))->get();
        
        // dd($userJoinTable);
        // $mutu = 0;
        // foreach($userJoinTable as $ujt){
        //     if($ujt === 'A'){
        //         $mutu += 
        //     }
        // }

        $data = [
            // 'Krs'       => $userKrs,
            'TotalMk'   => [count($userTotalMK)],
            'TotalSks'  => [(int) $userTotalSks],
            'datas'     => $userJoinTable,
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
        $userKrs = DB::table('krs')->where('npm',$userId->select('npm'))->get();

        $data = [
            'user' => $userId,
            'userKrs' => $userKrs,
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
        $userMatkul = DB::table('matakuliah')->where('kode_matakuliah',$userKrs->select('kode_matakuliah'))->get();

        $data = [
            'Krs'   => $userKrs,
            'Matkul'=> $userMatkul,
        ];

        return view('rencanaPembelajaran',['title' => 'Rencana Pembelajaran Semester'],['data'=> $data]);
    }

    public function nilai_semester_aktif(){
        $userId     = DB::table('users')->where('id', Auth::id())->get();
        $userKrs    = DB::table('krs')->where('npm',$userId->select('npm'))->get();
        // $userMatkul = DB::table('matakuliah')->where('kode_matakuliah',$userKrs->select('kode_matakuliah'))->get();

        $userJoinTable = DB::table('krs')
        ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
        ->where('krs.npm',$userId->select('npm'))->first();

        // dd($userJoinTable);

        $data = [
            'dataKrs'   =>  $userKrs,
            'dataMatkul'=>  $userJoinTable,
        ];

        dd($data['dataMatkul']);

        return view('nilaiSemesterAktif',['title' => 'Nilai Semester Aktif'], ['data' => $data]);
        // return view('nilaiSemesterAktif',['title' => 'Nilai Semester Aktif']);
    }
}
