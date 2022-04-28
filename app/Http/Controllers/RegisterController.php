<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Auth;
use DB;
class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {

            $validateData = $request->validate([
            'username' => 'required|max:255',
            'nik' => 'required|min:8|max:8|unique:users',
            'file' => 'image|file|max:1024|required|mimes:jpeg,jpg,png,gif',
            'password' => 'required|min:5|max:255'
        ]);

        if($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('post-images');
        }

        $validateData['password'] = bcrypt($validateData['password']);

    User::create($validateData);
        Alert::success('Selamat', 'Akun Anda Berhasil Terbuat');
    return redirect('/login');
    }

   }
