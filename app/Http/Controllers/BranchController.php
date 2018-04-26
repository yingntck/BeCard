<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
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
        $username = Auth::user()->username;
        $shop_id = DB::table('shops')->where('username',"=",$username)->first()->id;
        // dd($shop_id);
        Branch::create(
            [
            'shop_id' =>  $shop_id,
            'username' => $username,
            'name' => request()->name,
            'phone' => request()->phone,
            'latlng' => request()->lat.','.request()->lng,
        ]);

        return redirect('/shop/branch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $user = Auth::user()->username;
        $branches = DB::table('branches')->where('username',$user)->get();
        $package = DB::table('shops')->where('username',$user)->first()->package;
        $count = count($branches);
        // dd(count($branches));
        return view('branch.show' , [ 'branches' => $branches , 'count' => $count , 'package' => $package]);
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
