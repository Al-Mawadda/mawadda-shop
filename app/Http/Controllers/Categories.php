<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class Categories extends Controller{
    
    function index(){
        return view('dashboard.cat.index');
    }

    function save(Request $res){

        $this->validate($res,[
            'name'  => 'required',
            'img'   => 'required',
        ]);

        $data = Category::create([
            'name' => $res->name,
            'img'  => 'storage/'.$res->file('img')->store('public/cat','public'),
        ]);

        if($data)
            return redirect()->route('cat-show');
        else
            return back()->with('error','all field is required');

    }

    function show(){
        $data = Category::all();
        return view('dashboard.cat.show',compact('data'));
    }

    function edit($id){
        $data = Category::where('id','=',$id)->first();

        return view('dashboard.cat.edit',compact('data'));
    }

    function store(Request $res,$id){

        $data = Category::where('id','=',$id)->first();

        if($res->img !=null){
            $data->img = 'storage/'.$res->file('img')->store('public/cat','public');
        }

        $data->name = $res->name;

        $data->save();
        return redirect()->route('cat-show');

    }
    
    function delete($id){

        $data = Category::where('id','=',$id)->first();
        $data->delete();
        return redirect()->route('cat-show');
    }






    //API FUNCTION


    function get_cats(){

        return Category::all()->count() > 0 ? [ "success" => true , "data" =>Category::all()] : ["success" => false , "data" =>"no data"];

    }
}
