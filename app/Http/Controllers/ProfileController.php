<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\buyer;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::user()->id;
        $user = user::all()->where('id', '=', $id);
        $buyer = buyer::all()->where('users_id', '=', $id);

        return view('profile',['user'=>$user,'buyer'=>$buyer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
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
                    
            // $this->validate($request,[
            //     'file' => 'mimes:pdf'
            // ]);

            //upload
            // $name_po = $request->no_po .'.pdf';
            // $request->file('file_po')->storeAs('public/po', $name_po);
            $date= date('Y-m-d H:i:s');
            $buyer = new buyer;
           
            $buyer->username = Auth::user()->name;
            $buyer->email = Auth::user()->email;
            $buyer->perusahaan = $request->perusahaan;
            $buyer->alamat = $request->alamat;
            $buyer->telepon = $request->telepon;
            $buyer->updated_at = $date;
            $buyer->users_id = Auth::user()->id;
            $buyer->save();

            return redirect('/profile');
           
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
    public function password()
    {
        
        return view('create_password');
    }
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
        $date= date('Y-m-d H:i:s');
        $user = User::find($id);
           
            $user->updated_at = $date;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('/profile');
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
