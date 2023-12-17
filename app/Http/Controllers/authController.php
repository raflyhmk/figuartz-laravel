<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }
    public function register_process(Request $request){
    $request->validate([
        'password' => 'confirmed',
    ]);

    $existingUser = User::where('email', $request->email)->first();
    if ($existingUser) {
        return redirect()->back()->with('error', 'email sudah pernah terdaftar.');
    }
    $RegisterUser = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    if ($RegisterUser) {
        return redirect('/login');
    }
        return redirect()->back()->with('error', 'registrasi gagal.');
    }
    public function login_process(Request $request){
       $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } 
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } 
        return redirect()->back()->with('error', 'email/password yang dimasukan salah.');
    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
