<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\ProgramStudi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        $this->prodi();
        $this->dosen();
        $this->kelas();
        $this->matakuliah();
    }

    public function buatWaktu($waktuString){
        $waktuAwal = Carbon::createFromTimeString($waktuString);
        $waktuBaru = $waktuAwal->addHours(1)->addMinutes(40);
        return $waktuBaru -> format('H:i'); 
    }

    public function prodi(){
        // PRODI
        $prodi2 = [
            ["id_program_studi"=> Crypt::encryptString(random_int(1, 999)),"nama_program_studi" => Crypt::encryptString('Informatika'), "fakultas" => Crypt::encryptString('FTKI')],
            ["id_program_studi"=> Crypt::encryptString(random_int(1, 999)),"nama_program_studi" => Crypt::encryptString('Sistem Informasi'), "fakultas" => Crypt::encryptString('FTKI')],
        ];        
        foreach ($prodi2 as $prodi) {
            DB::table('program_studi')->insert($prodi);            
        }
    }

    public function dosen(){
        // DOSEN
        $dosen2 = [
            ["id_dosen" => Crypt::encryptString(random_int(1,9999)), "nama_dosen" => Crypt::encryptString("Djarot Hindarto"), "alamat" => Crypt::encryptString("Jln. ABC"), "tanggal_lahir"=> Crypt::encryptString(""), "email" => Crypt::encryptString(""), "telepon" => Crypt::encryptString("")]
        ];
        foreach($dosen2 as $dosen){
            DB::table('dosen')->insert($dosen);
        }

    }

    public function kelas(){
        // KELAS / JADWAL
        $tempat = [
            ["4.001"],
            ["4.002"],
            ["4.003"],
            ["4.004"],
            ["4.005"],
            ["4.006"],
            ["4.101"],
            ["4.102"],
            ["4.103"],
            ["4.104"],
            ["4.105"],
            ["4.106"],
        ];

        $waktu = [
            ['08:00'],
            ['09:50'],
            ['11:40'],
            ['13:30'],
            ['15:20'],
            ['08:00'],
        ];

        $hari = [
            ['Senin'],
            ['Selasa'],
            ['Rabu'],
            ['Kamis'],
            ['Jumat'],
            ['Sabtu']
        ];

        $kelas = [];

        foreach ($tempat as $index => $temp) {            
            $indexWaktu = $index % count($waktu);
            $indexHari = $index % count($hari);
            $kelas[] = [
                "no_kelas" => Crypt::encryptString(random_int(1, 9999)),
                "kelas" => Crypt::encryptString("R." . str_pad($index + 1, 2, '0', STR_PAD_LEFT)),
                "tempat" => Crypt::encryptString($temp[0] . " VB"),
                "waktu" => isset($waktu[$indexWaktu]) ? Crypt::encryptString((string) $hari[$indexHari][0] . ' ' . (string) $waktu[$indexWaktu][0] . ' - ' . (string) $this->buatWaktu($waktu[$indexWaktu][0])) : null,
            ];
        }
        foreach($kelas as $k){
            DB::table('kelas')->insert($k);
        };
    }

    public function matakuliah(){
        // MATAKULIAH
        $get_dosen_id = DB::table('dosen')->select('id_dosen')->first();
        $get_prodi_id = DB::table('program_studi')->select('nama_program_studi','id_program_studi')->get();        

        // Simpan nama program studi
        $prodi = [];
        foreach($get_prodi_id as $p){
            $prodi[] = $p;
        }        
        // Simpan id program studi
        $id_prodi = [];
        foreach($prodi as $p => $val){                       
            if(Crypt::decryptString($val->nama_program_studi) == 'Informatika'){
                $id_prodi = $val->id_program_studi;
            }
        }                        
        $get_kelas = DB::table('kelas')->get();
        $matakuliah = [
            // Smstr 1
            ['kode_matakuliah' => Crypt::encryptString("22080302101"),"nama" => Crypt::encryptString('Algoritma dan Pemrograman I'),'sks' => Crypt::encryptString('4'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi,"no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080302103"),"nama" => Crypt::encryptString('Aljabar Linier'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080302104"),"nama" => Crypt::encryptString('Kalkulus I'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080302109"),"nama" => Crypt::encryptString('Pengantar Teknologi Komunikasi dan Informatika'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080302110"),"nama" => Crypt::encryptString('TIK dan Masyarakat'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000001103"),"nama" => Crypt::encryptString('Pendidikan Kewarganegaraan'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000001104"),"nama" => Crypt::encryptString('Bahasa Indonesia'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000001116"),"nama" => Crypt::encryptString('Bahasa Inggris'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],

            // Smstr 2
            ['kode_matakuliah' => Crypt::encryptString("22080302202"),"nama" => Crypt::encryptString('Algoritma dan Pemrograman II'),'sks' => Crypt::encryptString('4'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080302205"),"nama" => Crypt::encryptString('Kalkulus II'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080302206"),"nama" => Crypt::encryptString('Komunikasi Data dan Jaringan Komputer'),'sks' => Crypt::encryptString('4'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080302207"),"nama" => Crypt::encryptString('Matematika Diskrit'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080302208"),"nama" => Crypt::encryptString('Pemrograman Web'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000001201"),"nama" => Crypt::encryptString('Pendidikan Agama'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000001202"),"nama" => Crypt::encryptString('Pendidikan Pancasila'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],

            // Smster 3
            ['kode_matakuliah' => Crypt::encryptString("22080303111"),"nama" => Crypt::encryptString('Arsitektur dan Organisasi Komputer'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303113"),"nama" => Crypt::encryptString('Basis Data'),'sks' => Crypt::encryptString('4'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303115"),"nama" => Crypt::encryptString('Kecerdasan Artifisial'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303119"),"nama" => Crypt::encryptString('Perancangan dan Analisis Algoritma'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303121"),"nama" => Crypt::encryptString('Sistem Digital'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303122"),"nama" => Crypt::encryptString('Statistika dan Probabilitas'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303123"),"nama" => Crypt::encryptString('Struktur Data dan Algoritma'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],

            // Smster 4
            ['kode_matakuliah' => Crypt::encryptString("22080303212"),"nama" => Crypt::encryptString('Automata dan Kompilasi'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303214"),"nama" => Crypt::encryptString('Interaksi Manusia dan Komputer'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303216"),"nama" => Crypt::encryptString('Machine Learning'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303217"),"nama" => Crypt::encryptString('Metode Numerik'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303218"),"nama" => Crypt::encryptString('Mobile Programming'),'sks' => Crypt::encryptString('4'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080303220"),"nama" => Crypt::encryptString('Rekayasa Perangkat Lunak'),'sks' => Crypt::encryptString('4'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            
            // Smster 5
            ['kode_matakuliah' => Crypt::encryptString("22080304127"),"nama" => Crypt::encryptString('Data Science'),'sks' => Crypt::encryptString('4'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304134"),"nama" => Crypt::encryptString('Manajemen Proyek'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304137"),"nama" => Crypt::encryptString('Pemrograman Game'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304139"),"nama" => Crypt::encryptString('Pengolahan Citra'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304140"),"nama" => Crypt::encryptString('Sistem Operasi'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000001115"),"nama" => Crypt::encryptString('Kewirausahaan'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000002119"),"nama" => Crypt::encryptString('Olahraga/Seni'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000002118"),"nama" => Crypt::encryptString('Konservasil Alam dan Lingkungan'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22000002117"),"nama" => Crypt::encryptString('Pendidikan Anti Korupsi'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],

            // Smster 6
            ['kode_matakuliah' => Crypt::encryptString("22080304224"),"nama" => Crypt::encryptString('Algoritma Paralel'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304225"),"nama" => Crypt::encryptString('Augmented and Virtual Reality'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304226"),"nama" => Crypt::encryptString('Cloud Computing'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304232"),"nama" => Crypt::encryptString('Keamanan Siber'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304233"),"nama" => Crypt::encryptString('Kriptografi'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304239"),"nama" => Crypt::encryptString('Simulasi dan Pemodelan'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080305242"),"nama" => Crypt::encryptString('Kerja Praktek'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],

            // Smster 7
            ['kode_matakuliah' => Crypt::encryptString("22080304128"),"nama" => Crypt::encryptString('Deep Learning'),'sks' => Crypt::encryptString('4'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304129"),"nama" => Crypt::encryptString('Etika Profesi Teknologi Informasi'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304136"),"nama" => Crypt::encryptString('Natural Language Processing'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304141"),"nama" => Crypt::encryptString('Sistem Terdistribusi'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304135"),"nama" => Crypt::encryptString('Metodologi Penelitian'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],

            // Smster 8
            ['kode_matakuliah' => Crypt::encryptString("22080304230"),"nama" => Crypt::encryptString('ICT Technopreneurship and Leadership'),'sks' => Crypt::encryptString('2'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080304231"),"nama" => Crypt::encryptString('Internet of Things'),'sks' => Crypt::encryptString('3'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
            ['kode_matakuliah' => Crypt::encryptString("22080305243"),"nama" => Crypt::encryptString('Skripsi'),'sks' => Crypt::encryptString('6'),'id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$id_prodi, "no_kelas" => null],
        ];

        $kelas = $get_kelas->map(function ($item) {
            return ['no_kelas' => $item->no_kelas];
        })->toArray();      
        $kelas_count = count($get_kelas);
        
        foreach($matakuliah as $key => $index){
            $indexKelas = $key % $kelas_count;
            $matakuliah[$key]['no_kelas'] = $kelas[$indexKelas]['no_kelas'];
        }

        foreach($matakuliah as $m){
            DB::table('matakuliah')->insert($m);
        }
    }
}
