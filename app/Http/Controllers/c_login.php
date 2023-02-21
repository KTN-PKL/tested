<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert;
use App\Models\fasdes;
use App\Models\lokasi;
use App\Models\desa;
use App\Models\poktan;
use App\Models\absenharian;
use App\Models\kecamatan;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class c_login extends Controller
{
    public function __construct()
    {
        $this->lokasi = new lokasi();
        $this->poktan = new poktan();
        $this->desa = new desa();
        $this->kecamatan = new kecamatan();
        $this->fasdes = new fasdes();
        $this->harian = new absenharian();
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
            'poktan' =>$this->poktan->freePoktan(),
        ];
        return view('user.absen.register', $data);
    }
    public function postRegister(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'unique:users',
            'email' => 'unique:users',
        ],[
            'email.unique'=>'Email Sudah Terdaftar di Database.',
            'username.unique'=>'ID Sudah Terdaftar di Database.',
        ]);
      
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
            'username'=> $request->username,
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
        foreach ($request->poktan as $poktans) {
            $data = [
                'id_user' => $id+1,
            ];
            $this->poktan->editData($poktans, $data);
        }
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
            'email.required'=>'email atau id wajib terisi',
            'password.required'=>'Password wajib terisi',
        ]);
        $user = $request->email;
        $pass = $request->password;

        if(auth()->attempt(array('email'=>$user,'password'=>$pass)))
        {
            return redirect('/fasdes/dashboard');
        }
        elseif(auth()->attempt(array('username'=>$user,'password'=>$pass)))
        {
            return redirect('/fasdes/dashboard');
        }
        else
        {
            Alert::error('Login Gagal', 'Email/ID atau password salah Silahkan coba kembali')->showConfirmButton('Confirm', '#056839');
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
            date_default_timezone_set("Asia/Jakarta");
              $t = date("Y-m-d");
            $harian = $this->harian->cekid(Auth::user()->id);
            $masuk = 0;
            $terlambat = 0;
            if ($harian <> null) {
                foreach ($harian as $item) {
                    $masuk = $masuk + 1;
                    $dat = explode(":" , $item->jam);
                    $H = $dat[0] * 60;
                    $hasil = $H + $dat[1];
                    if ($hasil > 480) {
                        $terlambat = $terlambat + 1;
                    }
                }
            }
            $data = ['cek'=> $this->harian->cek(Auth::user()->id, $t),
        'rekap'=> $masuk,
        'telat'=> $terlambat];
            return view('user.dashboard', $data);
        }else{
            return redirect()->back()->with('error', 'Email atau Password Salah!');
        }
       
    }

   
}
