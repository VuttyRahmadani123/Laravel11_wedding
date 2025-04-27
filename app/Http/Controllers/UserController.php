<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }
    public function doLogin(Requestuest $request){
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Data untuk autentikasi
    $data = [
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ];

    // Coba melakukan autentikasi
    if (Auth::attempt($data)) {
        // Periksa apakah pengguna sudah terautentikasi
        if(Auth::check()) {
            // Redirect berdasarkan role pengguna
            if(Auth::user()->role == 'pelanggan') {
                if(Auth::user()->email_verified_at == ''){
                    Auth::logout();
                    return redirect()->route('login')->with('error' , 'Email belum terverifikasi, silahkan cek email anda kembali!!!')->withInput();
                }else
                    return redirect()->route('index');
            }elseif(Auth::user()->role == 'admin') {
                if(Auth::user()->email_verified_at == ''){
                    Auth::logout();
                    return redirect()->route('login')->with('error' , 'Email belum terverifikasi, silahkan cek email anda kembali!!!')->withInput();
                }else
                    return redirect()->route('admin.dashboard');
            }
        }
    }
    // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
    return redirect()->route('login')->with('error' , 'Email atau password salah.')->withInput($request->only('email'));
}
    public function register(){
        return view('user.register');
    }
    public function doregister(Request $request){
        $request->validate([
            'email'=>'required|string|email:rfc,dns|max:50|unique:users,email',
            'username'=>'required|max:50|min:3',
            'password'=>'required|string|min:5',
            'password-confirm'=>'required_with:password|same:password'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'email.string'=>'Email Harus String',
            'email.email'=>'Format email harus valid',
            'email.max'=>'Maximal email 25 karakter',
            'email.min'=>'Manimal email 5 karakter',
            'email.unique'=>'Email ini sudah terdaftar di database',
            'username.required'=>'Kolom Username Wajib Diisi',
            'username.min'=>'Username Minimum 5 Karakter',
            'username.max'=>'Username Maximun 50 Karakter',
            'password.string'=>'Password Hanya String Yang Diperbolehkan',
            'password.min'=>'Password Minimum 5 Karakter',
            'password-confirm.required_with'=>'Password Konfirmasi Harus Diisi',
            'password-confirm.same'=>'Password Konfirmasi Tidak Sama!!!'
        ]);

        $data = [
            'username'=>$request->input('username'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'role' => 'pelanggan'
        ];
        User::create($data);
        // pengecekan token
       

        return redirect()->route('login')->with('success','Email Verifikasi telah dikirim, silahkan cek email anda!!!')->withInput();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
    
}