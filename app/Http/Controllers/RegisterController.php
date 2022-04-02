<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Auth;
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
            'file' => 'required|mimes:jpeg,jpg,png,gif',
            'password' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

    User::create($validateData);
        Alert::success('Selamat', 'You\'ve Successfully Registered');
    return redirect('/');
    }
}
