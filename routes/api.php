<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    
    Route::get('slider'       ,'Sliders@get_slider');

    #############################################################################

    // Categories

    #############################################################################
    
    Route::get('cats'       ,'Categories@get_cats');

    #############################################################################

    // Products

    #############################################################################
    
    Route::get('prod-10'           ,'Products@get_products');
    Route::get('prod-cat/{id}'     ,'Products@get_prod');
    Route::get('prod-rand'         ,'Products@rand');

    #############################################################################


    // Shiping Fees

    #############################################################################
    
    Route::get('ship'       ,'Ship@get_fees');

    #############################################################################

    // Customer

    #############################################################################
    
    Route::post('cus-login'        ,'Customers@login');
    Route::post('cus-signup'       ,'Customers@signup');
    Route::post('cus-update/{id}'  ,'Customers@update');
    Route::get( 'del-cus/{id}'     ,'Customers@delete_account');
    #############################################################################

    // Order

    #############################################################################
    
    Route::post('order'                ,'Orders@new_order');
    Route::get('order-view/{id}'       ,'Orders@get_orders');
    Route::get('order-reuse/{id}'      ,'Orders@order_reuse');

    #############################################################################

    // Search

    #############################################################################
    
    Route::get('search-cat/{text}'           ,'MainController@cat_search');

    Route::get('search-prod/{text}'           ,'MainController@prod_search');

    #############################################################################






