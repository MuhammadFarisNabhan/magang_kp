<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use App\Models\User;

use Carbon\Carbon;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

        return view('auths.login', ['data' => $programStudi]);
    }

    public function index_signup() {
        return view('auths.signup');
    }

    public function login(Request $request) : RedirectResponse {        
        $credentials = $request->validate([
            'npm'       =>  ['required'],
            'password'  =>  ['required'],
        ]);

        $logged = Auth::attempt($credentials);

        
        if($logged){
            $request->session()->regenerate();
            return redirect('/');          
        } else if ($logged == false) {
            // return back()->withErrors(['npm' => 'NPM atau Password salah'])->withInput();
            return Redirect::back()->withErrors(['error_message' => 'NPM atau Password salah'])->withInput();
        } else {
            return Redirect::back()->withErrors(['error_message' => 'NPM atau Password salah'])->withInput();
        }
    } 

    public function signup(Request $request) {
        $validator = Validator::make($request->all(),[
            'npm'          =>  'required',
            'nik'          =>  'required',
            'program_studi'=>  'required',
            'nama'         =>  'required',     
            'email'        =>  'required|email|unique:users',
            'password'     =>  'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $validatedData = $validator->validated(); 
        
        
        $user = DB::table('users')->insert([
            'npm'               => $validatedData['npm'],
            'nik'               => $validatedData['nik'],
            'name'              => $validatedData['nama'],
            'id_program_studi'  => $validatedData['program_studi'],
            'email'             => $validatedData['email'],
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
