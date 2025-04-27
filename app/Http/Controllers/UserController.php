<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
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
    public function doLogin(Request $request){
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
                return redirect()->route('index');
            }elseif(Auth::user()->role == 'admin') {
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
    public function doregister(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|string|email:rfc,dns|max:50|unique:users,email',
            'password' => 'required|string|min:5',
            'password-confirm' => 'required_with:password|same:password'
        ], [
            'email.required' => 'Email wajib diisi',
            'email.string' => 'Email harus berupa string',
            'email.email' => 'Format email harus valid',
            'email.max' => 'Maksimal email 50 karakter',
            'email.unique' => 'Email ini sudah terdaftar di database',
            'password.string' => 'Password harus berupa string',
            'password.min' => 'Password minimal 5 karakter',
            'password-confirm.required_with' => 'Konfirmasi password harus diisi',
            'password-confirm.same' => 'Konfirmasi password tidak sama dengan password'
        ]);
    
        // Buat Pelanggan baru
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pelanggan'
        ]);
    
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login!')
            ->withInput();
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('login');  
    }
}