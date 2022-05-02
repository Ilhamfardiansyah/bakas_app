<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
class DetailController extends Controller
{
    
        public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:details',
            'size' => 'required|unique:details'
        ]);

        Detail::create($validateData);
         toast('Data Berhasil Ditambahkan','success');
        return redirect('dashboard/posts/create');
    }
}
