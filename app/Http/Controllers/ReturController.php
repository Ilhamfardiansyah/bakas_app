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

    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        toast('Produk Berhasil Dihapus','success');
        return redirect('/dashboard/posts');
    }
}
