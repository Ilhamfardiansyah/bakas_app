<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Suplaier;
use App\Models\Rak;
use DB;
use Alert;

class EditController extends Controller
{
    public function edit(Post $post){
                $data = Post::with(['suplaier', 'rak']);
        return view('dashboard.edit.index', compact('data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        Post::where('barcode', $request->barcode)
            ->update([
                'stok' => $request->stok,
                'sub_total' => $request->sub_total
            ]);
            return back();
    
    }

    public function cari($barcode)
    {
        $data = Post::Where('barcode' , $barcode)->with(['suplaier', 'rak'])->first();
        // dd($data);
        if ($data==null) {
            Alert::error('Gagal','Tidak Temukan');
            return back();
        }
        else {
    return view('dashboard.edit.result', compact('data'));
                    }
            }
    }
