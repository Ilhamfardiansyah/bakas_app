<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class BarcodeController extends Controller
{
    public function cetak()
    {
        return view('dashboard.barcode.print', [
            'post' => Post::all()
        ]);
    }
}
