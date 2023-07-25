<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Sliders;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Products;
use App\Http\Controllers\Orders;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    // Slider

    #############################################################################
    
    Route::get('slider'       ,[Sliders::class,'get_slider']);
    Route::get('slider-prod/{id}'  ,[Sliders::class,'slider_prod']);

    #############################################################################

    // Categories

    #############################################################################
    
    Route::get('cats'       ,[Categories::class,'get_cats']);

    #############################################################################

    // Products

    #############################################################################
    
    Route::get('prod-10'           ,[Products::class,'get_products']);
    Route::get('prod-cat/{id}'     ,[Products::class,'get_prod']);
    Route::get('prod-rand'         ,[Products::class,'rand']);

    #############################################################################

    // Customer

    #############################################################################
    
    Route::post('cus-login'        ,[Customers::class,'login' ]);
    Route::post('cus-signup'       ,[Customers::class,'signup']);
    Route::post('cus-update/{id}'  ,[Customers::class,'update']);
    Route::get( 'del-cus/{id}'     ,[Customers::class,'delete_account']);
    #############################################################################

    // Order

    #############################################################################
    
    Route::post('order'                ,[Orders::class,'new_order'  ]);
    Route::get('order-view/{id}'       ,[Orders::class,'get_orders' ]);
    Route::get('order-reuse/{id}'      ,[Orders::class,'order_reuse']);

    #############################################################################

    // Search

    #############################################################################
    
    Route::get('search-cat/{text}'           ,[MainController::class,'cat_search']);

    Route::get('search-prod/{text}'           ,[MainController::class,'prod_search']);

    #############################################################################






