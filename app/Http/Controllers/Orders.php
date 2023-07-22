<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    
use App\Models\Order;
use App\Models\ItemOrder;

class Orders extends Controller{
    
    // 0 = new order  1 = accepted  2 = completed    


    function index(){
        $ord = Order::where('status',"!=",2)->with('itemord')->get();
        return view('dashboard.order.show',compact('ord'));
    }

    function save(Request $res){
        $ord = Order::where('status',"=",2)->with('itemord')->get();
        return view('dashboard.order.comp',compact('ord'));

    }

    function show(){
        $data = Dropshipingfee::all();

        return view('dashboard.ship.show',compact('data'));
    }

    function edit($id){
        $data = Order::where('id','=',$id)->first();

        return view('dashboard.order.edit',compact('data'));
    }

    function store(Request $res,$id){

        $data = Order::where('id','=',$id)->first();

        $data->status = $res->status;

        $data->save();
        return redirect()->route('order');

    }
    function delete($id){

        $data = Order::where('id','=',$id)->first();
        $data->delete();
        return redirect()->route('order');
    }






    function new_order(Request $res){

        $ord = Order::create([
            "cus_name" => $res->cus_name,
            "cus_id"   => $res->cus_id,
            "total"    => $res->total,
            "address"  => $res->address,
        ]);

        foreach($res->items as $row){

            ItemOrder::create([
                "order_id" => $ord->id,
                "prod_id" => $row["id"],
                "name"     => $row["name"],
                "qty"     => $row["qty"],
                "img"     => $row["img"],
                "price"     => $row["price"],
            ]);
        
        }
        echo("product saved");

    }


    function get_orders($id){

        return Order::where("cus_id",'=',$id)->get()->count() > 0 ? [ "success" => true , "data" =>Order::where("cus_id",'=',$id)->with('itemord')->get()] : ["success" => false , "data" =>"no data"];
    }

    function order_reuse($id){

        $data = Order::where('id','=',$id)->first();

        $data->status = 0;

        $data->save();
        return [ "success" => true ];

    }
}


















