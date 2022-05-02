<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class DetailController extends Controller
{
    public function index()
    {
        return view('dashboard.detail.index' ,compact('index'));
    }

    public function create(Request $request)
    {
        return view('dashboard.posts.create', [
            'title' => 'Detail'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:details'
        ]);

        Detail::create($validateData);
        dd($validateData);
    }
}
