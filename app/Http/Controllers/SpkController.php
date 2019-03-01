<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Spk;
use App\Barang;
use App\Buyer;

class SpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spk = Spk::all();
        return view('spk', ['spk'=>$spk]);
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
            $barang = Barang::all();
            $buyer = Buyer::all();
            return view('create_spk', ['barang'=>$barang,'buyer'=>$buyer]);
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
                    
            // $this->validate($request,[
            //     'file' => 'mimes:jpg,jpeg,png|max:2000'
            // ]);

            //upload
            // $name_po = $request->no_po .'.pdf';
            // $request->file('file_po')->storeAs('public/po', $name_po);

            $spk = new Spk;
            $spk->no_spk = $request->no_spk;
            $spk->qty = $request->qty;
            $spk->keterangan = $request->keterangan;
            $spk->pengiriman = $request->pengiriman;
            $spk->stock = $request->stock;
            $spk->barang_id = $request->barang_id;
            $spk->buyer_id = $request->buyer_id;
            $spk->save();

            return redirect('/spk');
           
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
        //
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
        //
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
