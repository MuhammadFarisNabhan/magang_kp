<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\KRS;
use App\Models\Mahasiswa;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class MahasiswaController extends Controller
{
    public function infoSemester_Thakad(){
        $getData = new KRS();
        $data = [
            'tahun_akademik'    => $getData->buatTahunAkademik(),
            'semester'          => $getData->getSemester(),
        ];

        return $data;
    }

    public function index_dashboard(){     
        $userId = DB::table('users')->where('id', Auth::id())->get();
        $programStudi = DB::table('program_studi')->where('id_program_studi',$userId->select('id_program_studi'))->get();

        $mahasiswa = [
            'npm'   => $userId->value('npm'),
            'nama'  => Crypt::decryptString($userId->value('name')),
            'prodi' => Crypt::decryptString($programStudi->value('nama_program_studi')),
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
            'nama'          => Crypt::decryptString($userId->value('name')), 
            'npm'           => $userId->value('npm'),
            'prodi'         => Crypt::decryptString($programStudi->value('nama_program_studi')),
            'email'         => Crypt::decryptString($userId->value('email')),
            'alamat'        => Crypt::decryptString($userId->value('alamat')),
            'telepon'       => Crypt::decryptString($userId->value('telepon')),
            'nik'           => Crypt::decryptString($userId->value('nik')),            
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
            'alamat'    =>  Crypt::encryptString($validatedData['alamat']),
            'telepon'   =>  Crypt::encryptString($validatedData['hp']),
            'email'     =>  Crypt::encryptString($validatedData['email']),
            'nik'       =>  Crypt::encryptString($validatedData['nik']),
        ]);

        if($user){
            return redirect('/data-pribadi')->with(['success' => 'Pembaruan Sukses.']);
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

    public function jadwalPribadi(){
        $userId = DB::table('users')->where('id', Auth::id())->select('npm')->first();
        $jadwalPribadi = DB::table('users')
            ->join('krs','users.npm','=','krs.npm')
            ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
            ->join('kelas','matakuliah.no_kelas','=','kelas.no_kelas')
            ->where('krs.status','=','berjalan')
            ->where('users.npm','=',$userId->npm)
            ->select('waktu','tempat','matakuliah.kode_matakuliah','matakuliah.nama','semester','tahun_akademik','perkuliahan','kelas','sks')
            ->get(); 

        $timeRanges = [];

        foreach ($jadwalPribadi as $index => $val) {              
            $waktu = Crypt::decryptString($val->waktu);        
            list($waktuAwal, $waktuAkhir)   = explode(' - ', $waktu);
            list($hari, $waktuAwal_)        = explode(' ', $waktuAwal);
            $timeRanges[] = (object) [
                'hari'              => $hari,
                'awal'              => $waktuAwal_,
                'akhir'             => $waktuAkhir,
                'tempat'            => Crypt::decryptString($val->tempat),
                'kode_matakuliah'   => Crypt::decryptString($val->kode_matakuliah),
                'nama'              => Crypt::decryptString($val->nama),
                'semester'          => $val->semester,
                'tahun_akademik'    => ($val->tahun_akademik),
                'perkuliahan'       => ($val->perkuliahan),
                'kelas'             => Crypt::decryptString($val->kelas),
                'sks'               => Crypt::decryptString($val->sks),
            ];
        }
        
        $data = [
            'dataJadwalPribadi' => $timeRanges,
            'information'       => $this->infoSemester_Thakad(),
        ];        

        return view('jadwalPribadi', ['title' => 'Jadwal Pribadi'],['jadwalPribadi' => $data]);
    }

    public function getJadwal(Request $request){
        $kategori = $request->input('kategori');
        $userId = DB::table('users')->where('id', Auth::id())->select('npm')->first();
        $jadwalPribadi = DB::table('users')
            ->join('krs','users.npm','=','krs.npm')
            ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
            ->join('kelas','matakuliah.no_kelas','=','kelas.no_kelas')
            ->where('krs.status','=','berjalan')
            ->where('users.npm','=',$userId->npm)
            ->select('waktu','tempat','matakuliah.kode_matakuliah','matakuliah.nama','semester','tahun_akademik','perkuliahan','kelas','sks')
            ->get();      

        $timeRanges = [];

        foreach ($jadwalPribadi as $index => $val) {
            $waktu = Crypt::decryptString($val->waktu);
            list($waktuAwal, $waktuAkhir) = explode(' - ', $waktu);

            $timeRanges[] = (object) [
                'awal' => $waktuAwal,
                'akhir' => $waktuAkhir,
                'tempat' => Crypt::decryptString($val->tempat),
                'kode_matakuliah' => Crypt::decryptString($val->kode_matakuliah),
                'nama' => Crypt::decryptString($val->nama),
                'semester' => ($val->semester),
                'tahun_akademik' => ($val->tahun_akademik),
                'perkuliahan' => ($val->perkuliahan),
                'kelas' => Crypt::decryptString($val->kelas),
                'sks' => Crypt::decryptString($val->sks),
            ];
        }

        $data = [
            'dataJadwalPribadi' => $timeRanges,
        ];

        switch($kategori){
            case 'kuliah':
                $jadwalPribadi = DB::table('users')
                    ->join('krs','users.npm','=','krs.npm')
                    ->join('matakuliah','krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
                    ->join('kelas','matakuliah.no_kelas','=','kelas.no_kelas')
                    ->where('krs.status','=','berjalan')
                    ->where('users.npm','=',$userId->npm)
                    ->select('waktu','tempat','matakuliah.kode_matakuliah','matakuliah.nama','semester','tahun_akademik','perkuliahan','kelas','sks')
                    ->get();      

                $timeRanges = [];

                foreach ($jadwalPribadi as $index => $val) {
                    $waktu = Crypt::decryptString($val->waktu);
                    list($waktuAwal, $waktuAkhir) = explode(' - ', $waktu);
                    list($hari, $waktuAwal_)        = explode(' ', $waktuAwal);

                    $timeRanges[] = (object) [
                            'hari'              => $hari,
                            'awal'              => $waktuAwal_,
                            'akhir'             => $waktuAkhir,
                            'tempat'            => Crypt::decryptString($val->tempat),
                            'kode_matakuliah'   => Crypt::decryptString($val->kode_matakuliah),
                            'nama'              => Crypt::decryptString($val->nama),
                            'semester'          => ($val->semester),
                            'tahun_akademik'    => ($val->tahun_akademik),
                            'perkuliahan'       => ($val->perkuliahan),
                            'kelas'             => Crypt::decryptString($val->kelas),
                            'sks'               => Crypt::decryptString($val->sks),
                        ];
                    }

                    $data = [
                        'dataJadwalPribadi' => $timeRanges,
                        'information'       => $this->infoSemester_Thakad(),
                    ];
                break;
            case 'uts':

                break;
            case 'uas':
                break;
            default:
                return redirect('/jadwal-pribadi')->back()->withErrors(['error'=>'Terjadi masalah tak sistem.']);
                break;
        }
        
        return view('jadwalPribadi', ['title' => 'Jadwal Pribadi'],['jadwalPribadi' => $data]);
    }
}
