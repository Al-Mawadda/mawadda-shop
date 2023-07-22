<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;

class Sliders extends Controller{
    

    function index(){
        return view('dashboard.slider.index');
    }

    function save(Request $res){

        $this->validate($res,[
            'img'   => 'required',
        ]);

        $data = Slider::create([
            'img' => 'storage/'.$res->file('img')->store('public/slider','public'),
        ]);

        if($data)
            return redirect()->route('slider-show');
        else
            return back()->with('error','all field is required');

    }

    function show(){
        $data = Slider::all();

        return view('dashboard.slider.show',compact('data'));
    }

    function edit($id){
        $data = Slider::where('id','=',$id)->first();

        return view('dashboard.slider.edit',compact('data'));
    }

    function store(Request $res,$id){

        $data = Slider::where('id','=',$id)->first();

        if($res->img !=null){

           // unlink($data->img);
            $data->img = 'storage/'.$res->file('img')->store('public/slider','public');
        }

        $data->save();
        return redirect()->route('slider-show');

    }
    function delete($id){

        $data = Slider::where('id','=',$id)->first();
       // unlink($data->img);
        $data->delete();
        return redirect()->route('slider-show');
    }







    //API FUNCTION


    function get_slider(){

        return Slider::all()->count() > 0 ? [ "success" => true , "data" =>Slider::all()] : ["success" => false , "data" =>"no data"];

    }












        
}
