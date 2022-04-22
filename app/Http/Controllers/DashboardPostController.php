<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rak;
use App\Models\Suplaier;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.posts.index', [
            'post' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'raks' => Rak::all(),
            'suplaiers' => Suplaier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([ 
            'suplaier_id' => 'required',
            'no_po' => 'required',
            'plu' => 'required|unique:posts', 
            'nama_barang' => 'required',
            'barcode' => 'required|unique:posts',
            'rak_id' => 'required',
            'stok' => 'required'
        ]);

        // $validator = validator()->make(request()->all(), [
        //     'type' => 'required|integer'
        // ]);
        
        // if ($validator->fails()) {
        //     redirect()->back()->with('eror' ,['SALAH!!']);
        // }

        Post::create([
            'posts' => $request->post,
                    ]);
        toast('Produk Berhasil Ditambahkan','success');
        return redirect('/dashboard/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
