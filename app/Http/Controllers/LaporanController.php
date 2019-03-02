<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Laporan;
use App\Spk;
use App\Po;
use App\buyer;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth=Auth::user()->role;

        if ($auth=='buyer') {
            $id= Auth::user()->id;
            $laporan = Laporan::all()->where('buyer_id', '=', $id);
            return view('laporan', ['laporan'=>$laporan]);
        }

        $laporan = Laporan::all();
        return view('laporan', ['laporan'=>$laporan]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth=Auth::user()->role;

        if ($auth=='exim') {
            $buyer = Buyer::all();
            $po = PO::all();
            $spk = Spk::all();
            return view('create_laporan', ['buyer'=>$buyer,'po'=>$po,'spk'=>$spk,]);
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

        if ($auth=='exim') {
                    
            // $this->validate($request,[
            //     'file' => 'mimes:pdf'
            // ]);

            //upload
            // $name_po = $request->no_po .'.pdf';
            // $request->file('file_po')->storeAs('public/po', $name_po);

            $laporan = new Laporan;
            $laporan->pengiriman = $request->pengiriman;
            $laporan->status = $request->status;
            $laporan->buyer_id = $request->buyer_id;
            $laporan->po_id = $request->po_id;
            $laporan->spk_id = $request->spk_id;

            $laporan->save();

            return redirect('/laporan');
           
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

        if ($auth=='exim') {
            $laporan = Laporan::all()->where('id', '=', $id);
            return view('edit_laporan',['laporan'=>$laporan]);
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
