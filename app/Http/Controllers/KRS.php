<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class KRS extends Controller
{
    public function buatTahunAkademik(){
        $tahunSekarang = Carbon::now()->year;
        $bulanSekarang = Carbon::now()->month;

        if($bulanSekarang >= 9){
            return "{$tahunSekarang}/" . ($tahunSekarang + 1);
        } else {
            return ($tahunSekarang - 1) . "/{$tahunSekarang}";
        }
    }

    public function getSemester(){
        $ganjilStart = Carbon::createFromDate(date('Y'), 9, 2);
        $genapStart = Carbon::createFromDate(date('Y'), 3, 3);

        $today = Carbon::now();

        if ($today->greaterThanOrEqualTo($ganjilStart) && $today->lessThan($genapStart)) {
            return 'Ganjil';
        } elseif ($today->greaterThanOrEqualTo($genapStart)) {
            return 'Genap';
        } else {            
            return 'Belum Memasuki Semester';
        }
    }

    public function mengisiKRS(){
        $mataKuliah = DB::table('matakuliah')
            ->join('dosen', 'matakuliah.id_dosen', '=', 'dosen.id_dosen')
            ->join('program_studi', 'matakuliah.id_program_studi','=','program_studi.id_program_studi')
            ->join('kelas','matakuliah.no_kelas','=','kelas.no_kelas')
            ->select('nama_dosen','nama','kode_matakuliah', 'sks','kelas','tempat','waktu')
            ->get();

        $mataKuliah_diambil = DB::table('users')
            ->join('krs','users.npm','=','krs.npm')
            ->join('matakuliah', 'krs.kode_matakuliah','=','matakuliah.kode_matakuliah')
            ->join('dosen', 'matakuliah.id_dosen', '=', 'dosen.id_dosen') 
            ->join('kelas','matakuliah.no_kelas','=','kelas.no_kelas')  
            ->select('nama_dosen','nama','matakuliah.kode_matakuliah', 'sks','kelas','tempat','waktu','status')
            ->get();                

        $data = [
            'mataKuliah' => $mataKuliah,
            'mataKuliah_diambil' => $mataKuliah_diambil,
        ];

        return view('mengisiKRS', ['title' => 'Mengisi KRS'], ['mataKuliah' => $data]);
    }

    public function ambilJadwal(Request $request){ 
        $userNpm = DB::table('users')->where('id', Auth::id())->select('npm')->first();
        
        $request->validate([
            'ambilMk' => 'required|string'
        ]);
        $ambilMk = $request->input('ambilMk');
        
        list($kode_matakuliah, $kelas, $nama, $jadwal , $sks, $nama_dosen) = explode('_', $ambilMk);
        
        $data = [
            'kode_matakuliah'   => $kode_matakuliah,
            'kelas'             => $kelas,
            'matakuliah'        => $nama,
            'jadwal'            => $jadwal,
            'sks'               => $sks,
            'nama_dosen'        => $nama_dosen,
        ];

        $getSks = (int) DB::table('krs')->where('krs.npm','=',$userNpm->npm)
        ->join('matakuliah', 'krs.kode_matakuliah','=','matakuliah.kode_matakuliah')        
        ->sum('matakuliah.sks');

        if($getSks <= 24 && $getSks + (int)$sks <= 24){
            $tahunAkademik = $this->buatTahunAkademik();
            $inserted = DB::table('krs')->where('krs.npm','=',$userNpm->npm)
            ->insert([
                'no_krs'          => random_int(1,9999),
                'kode_matakuliah' => $data['kode_matakuliah'],
                'id_penilaian'    => null,
                'no_absen'        => null,
                'tahun_akademik'  => $tahunAkademik,
                'semester'        => $this->getSemester(),            
                'perkuliahan'     => null,            
                'npm'             => $userNpm->npm
            ]); 
    
            if($inserted){
                return redirect('/mengisi-krs')->with(['success'=> "'{$data['matakuliah']}' berhasil ditambahkan"]);
            } else {
                return redirect('/mengisi-krs')->with(['error'=> "'{$data['matakuliah']}' gagal ditambahkan"]);
            }
        } else {
            return redirect('/mengisi-krs')->with(['messages'=>'Batas maksimal 24 sks.']);
        }
        

    }

    public function hapusJadwal(Request $request){                
        $hapusJadwal = $request->input('hapusJadwal'); // Array of buttons that were pressed
        $namaMK = DB::table('matakuliah')->where('kode_matakuliah','=',$hapusJadwal)->select('nama')->first();
        $namaMK = $namaMK->nama;

        $userNpm = DB::table('users')->where('id', Auth::id())->select('npm')->first();
        $hapus = DB::table('krs')
            ->join('matakuliah', 'krs.kode_matakuliah','=','matakuliah.kode_matakuliah')  
            ->where('krs.kode_matakuliah','=',$hapusJadwal)
            ->where('status','=','diambil')
            ->where('npm','=',$userNpm->npm)
            ->delete();

        if($hapus){
            return redirect('/mengisi-krs')->with(['success'=> "'{$namaMK}' berhasil dihapus"]);
        } else {
            return redirect('/mengisi-krs')->with(['error'=>"'{$namaMK}' gagal dihapus"]);
        }
    }

    public function simpanKRS(){
        $userNpm = DB::table('users')->where('id', Auth::id())->select('npm')->first();
        // $mataKuliah_diambil = DB::table('users')
        // ->join('krs','users.npm','=','krs.npm')
        // ->where('krs.status','=','diambil') 
        // ->where('users.npm','=',$userNpm->npm)
        // ->get();

        // dd($mataKuliah_diambil);

        $ubahStatus = DB::table('krs')
            ->where('npm','=',$userNpm->npm)
            ->update(['status' => 'berjalan']);              

        if($ubahStatus){            
            return redirect('/mengisi-krs')->with([
                'success'=>'KRS berhasil diposting. Menunggu persetujuan dosen pembimbing akademik.',
                // 'status' => 'posted',
            ]);
        } else {
            return redirect('/mengisi-krs')->with([
                'error'=>'KRS gagal diposting.',
                // 'status' => 'draft',
            ]);
        }
    }

    public function cetakKrsKpu(){
        $userId     = DB::table('users')->where('id', Auth::id())->get();
        $userKrs    = DB::table('krs')->where('npm',$userId->select('npm'))->get();

        $data = [
            'Krs' => $userKrs
        ];

        return view('cetakKRS_KPU',['title' => 'Cetak KRS atau KPU'],['data' => $data]);
    }
}
