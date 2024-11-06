<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use App\Models\User;

use Carbon\Carbon;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Auths extends Controller
{
    //
    public function index_login() {
        $programStudi = DB::table('program_studi')->select('id_program_studi','nama_program_studi')->get(); 
        $datas = [];
        foreach($programStudi as $p => $val){
            $datas[] = [
                'prodi'     => Crypt::decryptString($val->nama_program_studi),
                'id_prodi'  => Crypt::decryptString($val->id_program_studi)
            ];            
        }        
        return view('auths.login', ['data' => $datas]);
    }

    public function index_signup() {
        return view('auths.signup');
    }

    public function login(Request $request) : RedirectResponse {                 
        $credentials = $request->validate([
            'npm'       =>  ['required'],
            'password'  =>  ['required'],
        ]);    
        // $credentials = $request->only('npm','password');
        // $user = DB::table('users')->select('npm')->get();       

        // $data = [];

        // foreach($user as $u => $val){
        //     $data[] = Crypt::decryptString($val->npm);            
        // }            
        $logged = Auth::attempt($credentials);
        
        // $datas= [];
        // foreach($data as $d){                 
        //     // $datas[] = $d;
        //     if($d == $credentials['npm']){
        //         Auth::attempt($credentials);
        //         $request->session()->regenerate();
        //         return redirect('/');   
        //     }
        //     break;
        // }
        // dd($datas);

        if($logged){
            $request->session()->regenerate();
            return redirect('/');            
        } else if ($logged == false) {
            return Redirect::back()->withErrors(['error_message' => 'NPM atau Password salah'])->withInput();
        } else {
            return Redirect::back()->withErrors(['error_message' => 'NPM atau Password salah'])->withInput();
        }
    } 

    public function signup(Request $request) {
        $programStudi   = DB::table('program_studi')->select('id_program_studi','nama_program_studi')->get();
        $users          = DB::table('users')->select('id')->get();
        $validator = Validator::make($request->all(),[
            'npm'          =>  'required',
            'nik'          =>  'required',
            'nama'         =>  'required',     
            'prodi'        =>  'required',
            'alamat'       =>  'required',     
            'telephon'     =>  'required',     
            'email'        =>  'required|email|unique:users',
            'password'     =>  'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $validatedData = $validator->validated();         
        
        $id_prodi = [];
        foreach($programStudi as $p => $val){            
            if(Crypt::decryptString($val->id_program_studi) == $validatedData['prodi']){
                $id_prodi = $val->id_program_studi;
            }
        }

        $id_user = 0;
        if(count($users) == 0 ){
            $id_user = 1;
        } else {
            $id_user = count($users) + 1;
        }

        $user = DB::table('users')->insert([
            'id'                => Crypt::encryptString($id_user),
            'npm'               => ($validatedData['npm']),
            'nik'               => Crypt::encryptString($validatedData['nik']),
            'name'              => Crypt::encryptString($validatedData['nama']),
            'id_program_studi'  => $id_prodi,
            'alamat'            => Crypt::encryptString($validatedData['alamat']),
            'telepon'           => Crypt::encryptString($validatedData['telephon']),
            'email'             => Crypt::encryptString($validatedData['email']),
            'password'          => Hash::make($validatedData['password']),            
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
        
        if ($user){           
            return redirect('/login');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create user.'])->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('login');
    }
}
