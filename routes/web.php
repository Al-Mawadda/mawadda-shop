<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Sliders;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Products;
use App\Http\Controllers\Orders;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

####################### LOGIN ROUTE #########################

    Route::get('/login', [MainController::class,'user_login'])->name('login');

    Route::post('/login',[MainController::class,'check_login']);

##############################################################



Route::group(['middleware' => 'auth:web'],function(){

#######################################################

    ################################################################################################

    Route::get('/'              ,[MainController::class,'index']       )->name('index');
    Route::get('/logout'        ,[MainController::class,'logout']      )->name('logout');
    Route::get('admin-edit'     ,[MainController::class,'edit_profile'])->name('admin-edit');
    Route::post('admin-edit'    ,[MainController::class,'save_profile'])->name('admin-edit-save');



    // Sliders

    ########################################################################################

    Route::get('slider'              ,[Sliders::class,'index' ])->name('slider');
    Route::post('slider'             ,[Sliders::class,'save'  ])->name('slider-save');
    Route::get('slider-show'         ,[Sliders::class,'show'  ])->name('slider-show');
    Route::get('slider-edit/{id}'    ,[Sliders::class,'edit'  ])->name('slider-edit');
    Route::post('slider-edit/{id}'   ,[Sliders::class,'store' ])->name('slider-store');
    Route::get('slider-delete/{id}'  ,[Sliders::class,'delete'])->name('slider-delete');

    #########################################################################################

    // Categories

    ########################################################################################

    Route::get('cat'              ,[Categories::class,'index' ])->name('cat');
    Route::post('cat'             ,[Categories::class,'save'  ])->name('cat-save');
    Route::get('cat-show'         ,[Categories::class,'show'  ])->name('cat-show');
    Route::get('c at-edit/{id}'    ,[Categories::class,'edit'  ])->name('cat-edit');
    Route::post('cat-edit/{id}'   ,[Categories::class,'store' ])->name('cat-store');
    Route::get('cat-delete/{id}'  ,[Categories::class,'delete'])->name('cat-delete');

    #########################################################################################

    // Product

    ########################################################################################

    Route::get('prod'              ,[Products::class,'index' ])->name('prod');
    Route::post('prod'             ,[Products::class,'save'  ])->name('prod-save');
    Route::get('prod-show'         ,[Products::class,'show'  ])->name('prod-show');
    Route::get('prod-edit/{id}'    ,[Products::class,'edit'  ])->name('prod-edit');
    Route::post('prod-edit/{id}'   ,[Products::class,'store' ])->name('prod-store');
    Route::get('prod-delete/{id}'  ,[Products::class,'delete'])->name('prod-delete');

    #########################################################################################

    // Orders

    ########################################################################################

    Route::get('order'                ,[Orders::class  ,'index'  ])->name('order');
    Route::get('comp-order'          ,[Orders::class   ,'save'    ])->name('comp-order');
    Route::get('order-edit/{id}'      ,[Orders::class  ,'edit'   ])->name('order-view');
    Route::post('order-edit/{id}'      ,[Orders::class ,'store' ])->name('order-edit');
    Route::get('order-delete/{id}'    ,[Orders::class  ,'delete' ])->name('order-delete');

    #########################################################################################


});


Route::get('/photo', function () { Artisan::call('storage:link'); });















