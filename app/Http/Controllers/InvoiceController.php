<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Invoice;
use App\buyer;
use App\Po;

class InvoiceController extends Controller
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
            $invoice = Invoice::all()->where('users_id', '=', $id);
            return view('invoice', ['invoice'=>$invoice]);
        }

        $invoice = Invoice::all();
        return view('invoice', ['invoice'=>$invoice]);

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
            $po = Po::all();
            return view('create_invoice', ['buyer'=>$buyer,'po'=>$po]);
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
                    
            $this->validate($request,[
                'file' => 'mimes:pdf'
            ]);

            //upload
            $name_invoice = $request->no_invoice .'.pdf';
            $request->file('file_invoice')->storeAs('public/invoice', $name_invoice);

            $invoice = new Invoice;
            $invoice->no_invoice = $request->no_invoice;
            $invoice->file = $name_invoice;
            $invoice->buyer_id = $request->buyer_id;
            $invoice->po_id = $request->po_id;
            $invoice->save();

            return redirect('/invoice');
           
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
        $id= Auth::user()->id;
        $invoice = Invoice::all()->where('users_id', '=', $id);
        return view('detail_invoice', ['invoice'=>$invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::all()->where('id', '=', $id);
        return view('edit_invoice',['invoice'=>$invoice]);
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
