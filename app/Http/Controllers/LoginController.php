<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;
// use Http\Models\User;



class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required|min:8|max:8',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Congrats', 'You\'ve Successfully Registered');

            return redirect()->intended('/dashboard');
        }
        else {
        Alert::error('Nik dan Password Salah', 'Silahkan login kembali');
        return back();
        }

}
    public function logout(Request $request)
    {
    Auth::logout();
     $request->session()->invalidate();
     $request->session()->regenerateToken();
     return redirect('/home');
    }
}
