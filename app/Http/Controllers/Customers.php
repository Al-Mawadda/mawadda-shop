<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class Customers extends Controller{
    
    // API

    function signup(Request $res){

        $data = Customer::create([
            'name'        => $res->name,
            'password'    => md5($res->password),
            'phone'       => $res->phone,
            'address'     => " ",

        ]);

        if($data)
            return ["success"=>true,"data"=>$data];
        else
            return ["success"=>false,"data"=>"signup error"];

    }

    function login(Request $res){

        $password = md5($res->password);

        $data = Customer::where( [ ['password',$password] , ['phone',$res->phone] ])->first();
        
        if($data)
            return ["success"=>true, "data"=>$data];
        else
            return ["success"=>false];
    }

    function update($id,Request $res){

        $data = Customer::where('id',$id)->first();
        
        if($res->password ==0){
            $data->name     = $res->name;
            $data->phone    = $res->phone;
        }else{
            $data->name     = $res->name;
            $data->password = md5($res->password);
            $data->phone    = $res->phone;
        }

        $data->save();
        

        if($data)
            return ["success"=>true,"data"=>$data];
        else
            return ["success"=>false,"data"=>"update error"];

    }

    function delete_account($id){

        $data = Customer::where('id',$id)->first()->delete();
        
        if($data)
            return ["success"=>true];
        else
            return ["success"=>false];
    }
}
