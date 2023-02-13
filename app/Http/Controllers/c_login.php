<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasdes;
use App\Models\lokasi;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class c_login extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.absen.register');
    }
    public function postRegister(Request $request)
    {
        $this->fasdes = new fasdes();
        $this->lokasi = new lokasi();
        $id = $this->fasdes->maxIdUser();

        $data =[
            'id_user'=>$id+1,
            'lokasi'=> $request->lokasi,
        ];
        $this->lokasi->addData($data);

        $file  = $request->profil;
        $filename = $request->email.'.'.$file->extension();
        $file->move(public_path('foto/profilfasdes'),$filename);
      

        $data = [
            'id' => $id+1,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level'=> "fasdes",
            'statusakun'=>"noverified",
            'profil'=>$filename,
        ];
        $this->fasdes->addData($data);
        return redirect()->route('loginfasdes')->with('msg', 'Pendaftaran selesai, silahkan tunggu verifikasi admin');
    
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
            return redirect('/fasdes/dashboard');
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
        if (Auth::user()->level == "fasdes" && Auth::user()->statusakun == "verified") {
            return view('user.dashboard');
        }else{
            return redirect()->back()->with('error', 'Email atau Password Salah!');
        }
       
    }

   
}
