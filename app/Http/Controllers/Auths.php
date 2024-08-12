<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Auths extends Controller
{
    //
    public function index_login() {
        return view('auths.login');
    }

    public function index_signup() {
        return view('auths.signup');
    }

    public function login(Request $request) {
        $request->validate([
            'npm'               =>  'required',
            'password'          =>  'required',
        ],[
            'npm.required'      =>  'NPM harus diisi',
            'password.required' =>  'password harus diisi',
        ]);

        $infologin = [
            'npm'               =>  $request->input('npm'),
            'password'          =>  $request->input('password')
        ];

        $user = DB::table('Mahasiswa')->where("npm",$infologin['npm'])->first();

        if($user && $user->password === $infologin['password']){
            return redirect('/');
        } else{
            return back()->withErrors(['npm' => 'NPM atau Password salah']);
        }
    } 

    public function signup(Request $request) {
        $validator = Validator::make($request->all(),[
            'npm'       =>  'required',
            'nama'      =>  'required',     
            'email'     =>  'required',
            'password'  =>  'required',
        ]);
        // $validator = Validator::make($request->all(),[
        //     'npm'       =>  'required'|'numeric',
        //     'nama'      =>  'required'|'string'|'max:255',     
        //     'email'     =>  'required'|'email',
        //     'password'  =>  'required'|'min:8',
        // ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }

         $validatedData = $validator->validated();
        
        $user = DB::table('Mahasiswa')->insert([
            'npm'           => $validatedData['npm'],
            'nama'          => $validatedData['nama'],
            'email'         => $validatedData['email'],
            'password'      => Hash::make($validatedData['password']),
        ]);
        // $user = Mahasiswa::create([
        //     'npm'       =>  $validatedData['npm'],
        //     'nama'      =>  $validatedData['nama'],
        //     'email'     =>  $validatedData['email'],
        //     'password'  =>  Hash::make($validatedData['password']),
        // ]);

        if ($user){
            Auth::login($user);
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create user.'])->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('/');
    }
}
