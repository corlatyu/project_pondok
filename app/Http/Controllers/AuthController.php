<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function index(){
       // kita ambil data user lalu simpan pada variable $user
        $user = Auth::user();
        // kondisi jika user nya ada 
        if($user){
            // jika user nya memiliki level admin
            if($user->level =='admin'){
                 // arahkan ke halaman admin ya :P
                return redirect()->intended('admin');
            }
              // jika user nya memiliki level user
            else if($user->level =='user'){
               // arahkan ke halaman user
                return redirect()->intended('user');
            }

        }
        return view('auth.login');
     }
    //
  public function proses_login(Request $request){
    // Validasi input username dan password
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    // Ambil data request username & password saja
    $credential = $request->only('username', 'password');

    // Cek jika data username dan password valid (sesuai) dengan data
    if(Auth::attempt($credential)){
        // Kalau berhasil simpan data usernya di variabel $user
        $user = Auth::user();
        // Cek lagi jika level user admin maka arahkan ke halaman admin
        if($user->level == 'admin'){
            return redirect()->intended('admin');
        }
        // Tapi jika level usernya user biasa maka arahkan ke halaman user
        else if($user->level == 'user'){
            return redirect()->intended('user');
        }
        // Jika belum ada role maka ke halaman /
        return redirect()->intended('/');
    }

    // Jika tidak ada data user yang valid maka kembalikan lagi ke halaman login
    // Kirim pesan error kalau login gagal
    return redirect('login')
        ->withInput()
        ->with('login_gagal', 'Password salah');
}


     public function register(){
      // tampilkan view register
        return view('auth.register');
      }


// aksi form register
      public function proses_register(Request $request){ 
//. kita buat validasi nih buat proses register
 // validasinya yaitu semua field wajib di isi
// validasi username itu harus unique atau tidak boleh duplicate username ya
        $validator =  Validator::make($request->all(),[
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
// kalau gagal kembali ke halaman register dengan munculkan pesan error
        if($validator ->fails()){
            return redirect('/register')
             ->withErrors($validator)
             ->withInput();
        }
// kalau berhasil isi level & hash passwordnya ya biar secure
        $request['level']='user';
        $request['password'] = bcrypt($request->password);

// masukkan semua data pada request ke table user
        User::create($request->all());

         // kalo berhasil arahkan ke halaman login
        return redirect()->route('login');
      }

     public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function logoutGet()
{
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->level == 'admin') {
            return redirect()->route('admin.index');
        } elseif ($user->level == 'user') {
            return redirect()->route('user.index');
        }
    }
    return redirect()->route('login');
}
}