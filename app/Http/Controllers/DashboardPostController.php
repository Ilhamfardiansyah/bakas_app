<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rak;
use App\Models\Suplaier;
use App\Models\Detail;
use App\Models\Size;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\http\Requests\StoreTransaction;
use DB;

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
            'post' => Post::all(),
            'rak' => Rak::all(),
            'suplaier' => Suplaier::all(),
            'sizes' => Size::all()
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
            'post' => Post::all(),
            'raks' => Rak::all(),
            'suplaiers' => Suplaier::all(),
            'details' => Detail::all(),
            'size' => Size::all()
        ]);
    }
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaction $request)
    {

        try{
  
        Post::create($request->validated());
        toast('Produk Berhasil Ditambahkan','success');
        return redirect('/dashboard/posts');
        }catch(\Throwable $e){
            dd($e->getMessage());
        }
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
     public function scan($barcode)
    {
       $data =  DB::table('posts')->where('barcode', $barcode)->first();
       return response()->json([
           'status' => 'ok',
           'data' => $data
       ]);
    }
}
