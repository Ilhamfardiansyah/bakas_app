<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Suplaier;
use DB;
class EditController extends Controller
{
    public function edit(Post $post){
        return view('dashboard.edit.edit', [
            'post' => $post
        ]);
    }

    public function update($barcode)
    {
        $data = DB::table('posts')->where('barcode' , $barcode)->first();
        dd($barcode);
    }
}
