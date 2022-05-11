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
            'post' => Post::with(['rak', 'suplaier', 'size', 'detail'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
       {

        $invoice = date('d-M-Y'). '-'. uniqid();

        return view('dashboard.posts.create', [
            'post' => Post::with(['rak', 'suplaier', 'size', 'detail'])->get(),
            'raks' => Rak::all(),
            'suplaiers' => Suplaier::all(),
            'details' => Detail::all(),
            'invoice' => $invoice,
            'size' => Size::all()
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
