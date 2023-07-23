<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class Products extends Controller{
    
    function index(){
    	$data = Category::all();
        return view('dashboard.prod.index',compact('data'));
    
    }

    function save(Request $res){

        $this->validate($res,[
            'name'      => 'required',
            'disc'      => 'required',
            'price'     => 'required',
            'percent'   => 'required',
            'qty'       => 'required',
            'cat_id'    => 'required',
            'img'       => 'required',
        ]); 
        if($res->percent != 0)
            $price = ($res->price /100) * $res->percent;
        else
            $price = $res->price;

        $data = Product::create([
            'name'      => $res->name,
            'disc'      => $res->disc,
            'price'     => $price,
            'old_price' => $res->price,
            'percent'   => $res->percent,
            'qty'       => $res->qty,
            'cat_id'    => $res->cat_id,
            'img'       => 'storage/'.$res->file('img')->store('public/prod','public'),
        ]);

        if($data)
            return redirect()->route('prod-show');
        else
            return back()->with('error','all field is required');

    }

    function show(){
        $data = Product::with('cat')->get();

        return view('dashboard.prod.show',compact('data'));
    }

    function edit($id){

        $data = Product::where('id','=',$id)->with('cat')->first();
        $x    = Category::all();
        return view('dashboard.prod.edit',compact(['data','x']));
    }

    function store(Request $res,$id){

        $data = Product::where('id','=',$id)->first();
        $data->name   = $res->name;
        $data->disc   = $res->disc;
        
        if($res->percent != 0)
            $price = ($res->price /100) * $res->percent;
        else
            $price = $res->price;

        $data->price  = $price;

        $data->old_price = $res->price;

        $data->qty    = $res->qty;

        $data->cat_id = $res->cat_id;
        if($res->img !=null){
            $data->img = 'storage/'.$res->file('img')->store('public/prod','public');
        }


        $data->save();
        return redirect()->route('prod-show');

    }
    
    function delete($id){
        $data = Product::where('id','=',$id)->first();
        $data->delete();
        return redirect()->route('prod-show');
    }




    //API FUNCTION


    function get_products(){

        return Product::all()->count() > 0 ? 
            [ "success" => true , "data" =>Product::with('cat')->orderBy('id','desc')->limit(10)->get()] : 
            ["success" => false , "data" =>"no data"];

    }


    function get_prod($id){

        return Product::where('cat_id',$id)->get()->count() > 0 ? 
            [ "success" => true , "data" =>Product::where('cat_id',$id)->with('cat')->orderBy('id','desc')->get()] : 
            ["success" => false , "data" =>"no data"];

    }

    function rand(){

        return Product::all()->count() > 0 ? 
            [ "success" => true , "data" =>Product::with('cat')->inRandomOrder()->limit(10)->get()] : 
            ["success" => false , "data" =>"no data"];

    }

}
