<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;
use App\Models\Post;
use App\Models\DetailRak;


class RakController extends Controller
{
    public function index()
    {
        return view('dashboard.rak.index',[
            'name' => Rak::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.rak.create', [
            'rak' => Rak::all(),
            'detail_rak' => DetailRak::all()
        ]);
    }

    public function store(Request $request)
    {   
        $validateData = $request->validate([
            'name' => 'required|unique:raks',
            'detailrak_id' => 'required'
        ]);

        Rak::create($validateData);
         toast('Data Berhasil Ditambahkan','success');
        return redirect('dashboard/rak');
    }
}
