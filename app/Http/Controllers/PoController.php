<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Po;
use App\buyer;

class PoController extends Controller
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
            $po = Po::all()->where('users_id', '=', $id);
            return view('po', ['po'=>$po]);
        }

        $po = Po::all();
        return view('po', ['po'=>$po]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $auth=Auth::user()->role;

        if ($auth=='buyer') {
            $id= Auth::user()->id;
            $buyer = buyer::all()->where('users_id', '=', $id);
            return view('create_po',['buyer'=>$buyer]);
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

        if ($auth=='buyer') {
                    
            $this->validate($request,[
                'file' => 'mimes:pdf'
            ]);

            //upload
            $name_po = $request->no_po .'.pdf';
            $request->file('file_po')->storeAs('public/po', $name_po);
            

            $po = new Po;
            $po->no_po = $request->no_po;
            $po->pengiriman = $request->pengiriman;
            $po->file_po = $name_po;
            $po->users_id = Auth::user()->id;
            $po->save();

            return redirect('/po');
           
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
        $url = Storage::get('po/'.$id);
        dd($url);
        $headers = array(
            'Content-Type: application/pdf',
        );
        $download = Storage::download($url, $id, $headers);
        
    }
    public function download($id)
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
        $po = Po::all()->where('id', '=', $id);
        return view('edit_po',['po'=>$po]);
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

        if ($auth=='buyer') {
                    
            $this->validate($request,[
                'file' => 'mimes:pdf'
            ]);

            //upload
            $name_po = $request->no_po .'.pdf';
            $request->file('file_po')->storeAs('public/po', $name_po);

            $po = Po::find($id);
            $po->no_po = $request->no_po;
            $po->pengiriman = $request->pengiriman;
            $po->file_po = $name_po;
            $po->users_id = Auth::user()->id;
            $po->save();

            return redirect('/po');
           
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
