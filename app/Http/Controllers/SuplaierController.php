<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suplaier;
use App\Models\Post;
use DB;
class SuplaierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Suplaier::all();
        return view('dashboard.suplaier.create', compact('data'));
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
            'name' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            // 'kode_po' => 'required'
        ]);

        $last=Suplaier::count();
        $kode_po='PO00'. $last.'-'. date('d-Y'). '-'. uniqid();

        Suplaier::create([
        'name' => $request->name,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp,
        'kode_po' => $kode_po    
        ]);
        toast('Data Suplaier Berhasil Ditambahkan','success');
        return redirect('/dashboard/suplaier/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Suplaier::where('id', $id)->first();
        return view('dashboard.suplaier.index', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            Suplaier::where('id', $id)
            ->update([
                'name' => $request->name,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp
            ]);
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Suplaier::Where('id', $id)->delete();
        toast('Data Suplaier Berhasil Ditambahkan','success');
        return redirect('/dashboard/suplaier/create');
    }
}
