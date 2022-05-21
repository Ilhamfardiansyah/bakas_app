<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class ReturController extends Controller
{
    public function index(Post $post)
    {
        return view('dashboard.retur.index', [
            'post' => $post
        ]);
    }

    public function search($barcode)
    {
        $data = DB::table('posts')->where('barcode', $barcode)->first();
        return view('dashboard.retur.search', compact('data'));
    }

    public function destroy($barcode)
    {
        // dd($barcode);
        // $post = Post::find($barcode);
        // Post::destroy($post->barcode); // gak gini cuk
        Post::Where('barcode', $barcode)->delete();  
        toast('Produk Berhasil Hapus','success');
        return redirect('/dashboard/posts');
    }

    public function edit(Post $post)
    {
            
        return view('dashboard.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required'
        ]);

        Post::where('plu' , $post->plu)
            ->update($validatedData);

        toast('Nama Produk Berhasil Diedit','success');
        return redirect('/dashboard/posts/create');   
    }
}
