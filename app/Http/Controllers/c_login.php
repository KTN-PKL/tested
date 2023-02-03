<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class c_login extends Controller
{


    public function index()
    {
        return view('login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required'=>'email wajib terisi',
            'password.required'=>'Password wajib terisi',
        ]);
        $user = $request->email;
        $pass = $request->password;

        if(auth()->attempt(array('email'=>$user,'password'=>$pass)))
        {
            return redirect('/dashboard');
        }
        else
        {
            session()->flash('error', 'Email atau password salah');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('user.logout');
    }

    // Login multiuser
    public function dashboard(){

        if (Auth::user()->level == "admin") {
    
            return view('dashboard');
        } else {
            // session()->flash('error', 'Masukkan Akun Admin');
            // return redirect()->back();
            return view('user.dashboard');
        }
       
    }

   
}
