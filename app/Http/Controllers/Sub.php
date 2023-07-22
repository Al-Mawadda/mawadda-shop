<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCat;
class Sub extends Controller{
    
    function index(){
        $cat = Category::all();
        return view('dashboard.sub.index',compact('cat'));
    }

    function save(Request $res){

        $this->validate($res,[
            'name'     => 'required',
            'img'      => 'required',
            'cat_id'   => 'required',
        ]);

        $data = SubCat::create([
            'name' => $res->name,
            'cat_id' => $res->cat_id,
            'img'  => 'storage/'.$res->file('img')->store('public/sub','public'),
        ]);

        if($data)
            return redirect()->route('sub-show');
        else
            return back()->with('error','all field is required');

    }

    function show(){
        
        $data = SubCat::with('cat')->get();
        return view('dashboard.sub.show',compact('data'));
    }

    function edit($id){
        $data = SubCat::where('id','=',$id)->first();
        $cat = Category::all();
        return view('dashboard.sub.edit',compact('data','cat'));
    }

    function store(Request $res,$id){

        $data = SubCat::where('id','=',$id)->first();

        if($res->img !=null){

            // unlink($data->img);
            $data->img = 'storage/'.$res->file('img')->store('public/sub','public');
        }

        $data->name   = $res->name;
        $data->cat_id = $res->cat_id;

        $data->save();
        return redirect()->route('sub-show');

    }
    
    function delete($id){

        $data = SubCat::where('id','=',$id)->first();
        // unlink($data->img);
        $data->delete();
        return redirect()->route('sub-show');
    }
}
