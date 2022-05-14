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
        $post = Post::with(['rak', 'suplaier', 'size', 'detail'])->get();
        return view('dashboard.posts.index', compact('post')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
       {

        $invoice = date('d-M-Y'). '-'. uniqid();
        $suplaier = Suplaier::all();
        $rak = Rak::all();
        $detail = Detail::all();
        $size = Size::all();
        $data = Post::with(['rak', 'suplaier', 'size', 'detail'])->get();
        return view('dashboard.posts.create', compact('data', 'invoice' , 'suplaier', 'rak', 'detail', 'size'));
    }
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
         $validateData = $request->validate([
            'suplaier_id' => 'required',
            'no_po' => 'required',
            'plu' => 'required|unique:posts', 
            'nama_barang' => 'required',
            'barcode' => 'required|unique:posts',
            'rak_id' => 'required',
            'stok' => 'required',
            'harga_satuan' => 'required',
            'detail_id' => 'required',
            'sub_total' => 'max:255',
            'size_id' => 'required'
            // 'kode_po' => 'required'
        ]);

        // try{
  
        Post::create($validateData);
        toast('Produk Berhasil Ditambahkan','success');
        return redirect('/dashboard/posts');
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
        {
        $rules = [
            'stok' => 'required'
        ];

        $validateData = $request->validate($rules);

        Post::where('id', $post->id)
            ->update($validateData);
            return redirect('dashboard.edit.result', compact('data'));
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
