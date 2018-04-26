<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Shop;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shops.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $packages = [
            "sliver" => "Sliver",
            "gold" => "Gold"
        ];
        if($id == "1"){
            // var_dump('1');
            return view('shops.create',['package'=> "sliver" , 'packages' => $packages]);
        }
        else if($id == "2"){
            // var_dump('2');
            return view('shops.create',['package'=> "gold" , 'packages' => $packages]);
        }
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
        $imageName = 'default.jpg';
        $username = request()->username;
        if(request()->image != null){
            request()->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);
            $type = request()->type;
            $file = request()->file('image');
            $imageName = $username."_".time().'.'.request()->image->getClientOriginalExtension();
            $path = public_path('img/shops/logo');
            $file->move($path, $imageName);
            }


        Shop::create(
            ['username' => $username,
            'name' => request()->name,
            'description' => request()->desc,
            'logo' => $imageName,
            'imgCover' => "defaultCover.png",
            'time' => request()->timeOpen.','.request()->timeClose,
            'type' => request()->type,
            'latlng' => request()->lat.','.request()->lng,
            'package' => request()->package,
        ]);

        $log = new LogController;
        $log->record($username,'Create new Shop as '.request()->name,'');

        return redirect(route('shop.show'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $user = Auth::user()->username;
        // $listShops = DB::table('shops')->where('username',$user)->get();
        // return view('shops.create',['shops'=>$listShops]);
        return view('shops.show');
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

    public function membercard(){
        $shop = DB::table('shops')->where('username',Auth::user()->username)->first();
        return view('shops.membercard',['shop'=>$shop]);
    }

    public function membercardCreate(Request $request){
        request()->validate([
            'name' => 'required',
            'desc' => 'required',
            'bahtperpoint' => 'required',
            'imageBG' => 'required|image|max:10000',
            'color1' => 'required',
            'color2' => 'required',
        ]);
        if (request()->shop_package == "sliver"){
            $imageName = "defaultCard.png";
            $color1 = "#008df2";
            $color2 = "#5eb9fb";
        }else{
            $file = request()->file('imageBG');
            $imageName = request()->shop_id."_".time().'.'.request()->imageBG->getClientOriginalExtension();
            $path = public_path('img/cards');
            $file->move($path, $imageName);
            $color1 = request()->color1;
            $color2 = request()->color2;
        }
        DB::table('membercards')->insert(
            ['username' => Auth::user()->username,
            'shop_id' => request()->shop_id,
            'name' => request()->name,
            'description' => request()->desc,
            'imageBG' => $imageName,
            'colorHex1' => $color1,
            'colorHex2' => $color2,
            'bahtperpoint' => request()->bahtperpoint,
            'created_at' => Carbon::now(),
        ]);

        return view('shops.membercard');
    }

    public function register(){
      return view('shops.register');
    }
}
