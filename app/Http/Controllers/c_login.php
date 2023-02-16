<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert;
use App\Models\fasdes;
use App\Models\lokasi;
use App\Models\desa;
use App\Models\kecamatan;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class c_login extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->desa = new desa();
        $this->kecamatan = new kecamatan();
        $this->fasdes = new fasdes();
    }

    public function index()
    {
        return view('user.login');
    }

    public function register()
    {
        $data = [
            'desa' => $this->desa->allData(),
            'kecamatan' => $this->kecamatan->allData(),
        ];
        return view('user.absen.register', $data);
    }
    public function postRegister(Request $request)
    {
      
        $id = $this->fasdes->maxIdUser();

        $data =[
            'id_user'=>$id+1,
            'id_desa'=> $request->id_desa,
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
            'jeniskelamin'=> $request->jeniskelamin,
            'no_telp'=>$request->no_telp,
        ];
        $this->fasdes->addData($data);
        Alert::success('Pendaftaran Berhasil', 'Pendaftaran akun anda berhasil tunggu verifikasi dari Admin')->showConfirmButton('Confirm', '#056839');
        return redirect()->route('loginfasdes')->with('success', 'Pendaftaran selesai, silahkan tunggu verifikasi admin');
    
    }

    public function desa($id_kecamatan)
    {
        $data = [
            'desa' => $this->desa->kecamatanData($id_kecamatan),
        ];
        return view('user.absen.desa', $data);
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
            Alert::error('Login Gagal', 'Email atau password salah Silahkan coba kembali')->showConfirmButton('Confirm', '#056839');
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
