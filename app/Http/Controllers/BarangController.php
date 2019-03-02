<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang', ['barang'=>$barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth=Auth::user()->role;

        if ($auth=='data') {
            return view('create_barang');
        }
        
        return redirect('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth=Auth::user()->role;

        if ($auth=='data') {
                    
            $this->validate($request,[
                'file' => 'mimes:jpg,jpeg,png|max:2000'
            ]);

            //upload
            $name_barang = time() .'.jpg';
            $request->file('file_foto')->storeAs('public/barang', $name_barang);

            $barang = new Barang;
            $barang->nama = $request->nama;
            $barang->foto = $name_barang;
            $barang->ukuran = $request->ukuran;
            $barang->material = $request->material;

            $barang->save();

            return redirect('/barang');
           
        }
        
        return redirect('dashboard');
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
        $auth=Auth::user()->role;

        if ($auth=='data') {
            $barang = Barang::all()->where('id', '=', $id);
            return view('edit_barang',['barang'=>$barang]);
        }
        
        return redirect('dashboard');
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
        $auth=Auth::user()->role;

        if ($auth=='data') {
                    
            $this->validate($request,[
                'file' => 'mimes:jpg,jpeg,png|max:2000'
            ]);

            //upload
            $name_barang = time() .'.jpg';
            $request->file('file_foto')->storeAs('public/barang', $name_barang);

            $barang = Barang::find($id);
            $barang->nama = $request->nama;
            $barang->foto = $name_barang;
            $barang->ukuran = $request->ukuran;
            $barang->material = $request->material;

            $barang->save();

            return redirect('/barang');
           
        }
        
        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
