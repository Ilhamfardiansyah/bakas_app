<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
class SizeController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:sizes'
        ]);

        Size::create($validateData);
        toast('Data Berhasil Ditambahkan','success');
        return redirect('dashboard/posts/create');
    }
}
