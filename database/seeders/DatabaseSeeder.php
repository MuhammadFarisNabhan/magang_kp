<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\ProgramStudi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ["id_program_studi"=> random_int(1, 9999),"nama_program_studi" => 'Informatika', "fakultas" => 'Teknologi Komunikasi dan Informatika'],
            ["id_program_studi"=> random_int(1, 9999),"nama_program_studi" => 'Sistem Informasi', "fakultas" => 'Teknologi Komunikasi dan Informatika'],
        ];        
        foreach ($prodi2 as $prodi) {
            DB::table('program_studi')->insert($prodi);            
        }
    }

    public function dosen(){
        // DOSEN
        $dosen2 = [
            ["id_dosen" => random_int(1,9999), "nama_dosen" => "Djarot Hindarto", "alamat" => "Jln. ABC", "tanggal_lahir"=> "", "email" => "", "telepon" => ""]
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
                "no_kelas" => random_int(1, 9999),
                "kelas" => "R." . str_pad($index + 1, 2, '0', STR_PAD_LEFT),
                "tempat" => $temp[0] . " VB",
                "waktu" => isset($waktu[$indexWaktu]) ? (string) $hari[$indexHari][0] . ' ' . (string) $waktu[$indexWaktu][0] . ' - ' . (string) $this->buatWaktu($waktu[$indexWaktu][0]) : null,
            ];
        }
        foreach($kelas as $k){
            DB::table('kelas')->insert($k);
        };
    }

    public function matakuliah(){
        // MATAKULIAH
        $get_dosen_id = DB::table('dosen')->select('id_dosen')->first();
        $get_prodi_id = DB::table('program_studi')->where('nama_program_studi','=','Informatika')->select('id_program_studi')->first();
        $get_kelas = DB::table('kelas')->get();
    
        $matakuliah = [
            // Smstr 1
            ['kode_matakuliah' => "22080302101","nama" => 'Algoritma dan Pemrograman I','sks' => '4','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi,"no_kelas" => null],
            ['kode_matakuliah' => "22080302103","nama" => 'Aljabar Linier','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080302104","nama" => 'Kalkulus I','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080302109","nama" => 'Pengantar Teknologi Komunikasi dan Informatika','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080302110","nama" => 'TIK dan Masyarakat','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000001103","nama" => 'Pendidikan Kewarganegaraan','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000001104","nama" => 'Bahasa Indonesia','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000001116","nama" => 'Bahasa Inggris','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],

            // Smstr 2
            ['kode_matakuliah' => "22080302202","nama" => 'Algoritma dan Pemrograman II','sks' => '4','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080302205","nama" => 'Kalkulus II','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080302206","nama" => 'Komunikasi Data dan Jaringan Komputer','sks' => '4','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080302207","nama" => 'Matematika Diskrit','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080302208","nama" => 'Pemrograman Web','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000001201","nama" => 'Pendidikan Agama','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000001202","nama" => 'Pendidikan Pancasila','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],

            // Smster 3
            ['kode_matakuliah' => "22080303111","nama" => 'Arsitektur dan Organisasi Komputer','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303113","nama" => 'Basis Data','sks' => '4','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303115","nama" => 'Kecerdasan Artifisial','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303119","nama" => 'Perancangan dan Analisis Algoritma','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303121","nama" => 'Sistem Digital','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303122","nama" => 'Statistika dan Probabilitas','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303123","nama" => 'Struktur Data dan Algoritma','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],

            // Smster 4
            ['kode_matakuliah' => "22080303212","nama" => 'Automata dan Kompilasi','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303214","nama" => 'Interaksi Manusia dan Komputer','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303216","nama" => 'Machine Learning','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303217","nama" => 'Metode Numerik','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303218","nama" => 'Mobile Programming','sks' => '4','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080303220","nama" => 'Rekayasa Perangkat Lunak','sks' => '4','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            
            // Smster 5
            ['kode_matakuliah' => "22080304127","nama" => 'Data Science','sks' => '4','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304134","nama" => 'Manajemen Proyek','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304137","nama" => 'Pemrograman Game','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304139","nama" => 'Pengolahan Citra','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304140","nama" => 'Sistem Operasi','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000001115","nama" => 'Kewirausahaan','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000002119","nama" => 'Olahraga/Seni','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000002118","nama" => 'Konservasil Alam dan Lingkungan','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22000002117","nama" => 'Pendidikan Anti Korupsi','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],

            // Smster 6
            ['kode_matakuliah' => "22080304224","nama" => 'Algoritma Paralel','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304225","nama" => 'Augmented and Virtual Reality','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304226","nama" => 'Cloud Computing','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304232","nama" => 'Keamanan Siber','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304233","nama" => 'Kriptografi','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304239","nama" => 'Simulasi dan Pemodelan','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080305242","nama" => 'Kerja Praktek','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],

            // Smster 7
            ['kode_matakuliah' => "22080304128","nama" => 'Deep Learning','sks' => '4','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304129","nama" => 'Etika Profesi Teknologi Informasi','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304136","nama" => 'Natural Language Processing','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304141","nama" => 'Sistem Terdistribusi','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304135","nama" => 'Metodologi Penelitian','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],

            // Smster 8
            ['kode_matakuliah' => "22080304230","nama" => 'ICT Technopreneurship and Leadership','sks' => '2','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080304231","nama" => 'Internet of Things','sks' => '3','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
            ['kode_matakuliah' => "22080305243","nama" => 'Skripsi','sks' => '6','id_dosen' => $get_dosen_id->id_dosen,"id_program_studi"=>$get_prodi_id->id_program_studi, "no_kelas" => null],
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
