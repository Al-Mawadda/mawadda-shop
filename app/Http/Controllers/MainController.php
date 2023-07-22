<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use Session;
use App\Models\Category;
use App\Models\Product;
class MainController extends Controller{

    function index(){
        
        return view('dashboard.index');

    }

    function user_login(){
        
        return view('dashboard.login');

    }
    
    function check_login(Request $x){
    
        $this->validate($x,[
    
            'name'     => 'required',
    
            'password'  => 'required|min:3',
    
        ]);
    
        $data = array(
    
            'name'     => $x->name,
    
            'password'  => $x->password
    
        );
    
        if(Auth::attempt($data)){
            
            return redirect()->route('index');

        }else{
            Session::put('eros', "Wrong login details");
            return back()->with('errors','Wrong login details');
        }
    
    }
    function edit_profile(){
        return view('dashboard.admin.edit');
    }

    function save_profile(Request $res){

        $data = User::where('id',Auth::user()->id)->update([
            'name'     => $res->name,

            'password' => bcrypt($res->password),
        ]);

        return $data == true?  redirect()->route('index') :  "error";
    }

    function logout(){
        Auth::logout();

        return redirect()->route('index');
    }


    function prod_search($text){

        $data = Product::query()->where('name','Like', '%'.$text.'%')->with('cat')->get();
        
        return $data? ["success"=>true,"data"=>$data]:["success"=>false,"data"=>"no data"];
    }

    function cat_search($text){

        $data = Category::query()->where('name','Like', '%'.$text.'%')->get();
        return $data? ["success"=>true,"data"=>$data]:["success"=>false,"data"=>"no data"];
    }
}








