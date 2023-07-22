<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('/login', 'MainController@user_login')->name('login');

    Route::post('/login','MainController@check_login');

##############################################################



Route::group(['middleware' => 'auth:web'],function(){

#######################################################

    ################################################################################################
    
    Route::get('/'             ,'MainController@index')->name('index'); 

    Route::get('/logout'       ,'MainController@logout')->name('logout');

    Route::get('admin-edit'    ,'MainController@edit_profile')->name('admin-edit');
    Route::post('admin-edit'    ,'MainController@save_profile')->name('admin-edit-save');


    
    // Sliders

    ########################################################################################

    Route::get('slider'              ,'Sliders@index')->name('slider');
    Route::post('slider'             ,'Sliders@save')->name('slider-save');
    Route::get('slider-show'         ,'Sliders@show')->name('slider-show');
    Route::get('slider-edit/{id}'    ,'Sliders@edit')->name('slider-edit');
    Route::post('slider-edit/{id}'   ,'Sliders@store')->name('slider-store');
    Route::get('slider-delete/{id}'  ,'Sliders@delete')->name('slider-delete');

    #########################################################################################

    // Categories

    ########################################################################################

    Route::get('cat'              ,'Categories@index')->name('cat');
    Route::post('cat'             ,'Categories@save')->name('cat-save');
    Route::get('cat-show'         ,'Categories@show')->name('cat-show');
    Route::get('cat-edit/{id}'    ,'Categories@edit')->name('cat-edit');
    Route::post('cat-edit/{id}'   ,'Categories@store')->name('cat-store');
    Route::get('cat-delete/{id}'  ,'Categories@delete')->name('cat-delete');

    #########################################################################################

    // Sub-Categories

    ########################################################################################

    Route::get( 'sub'              ,'Sub@index' )->name('sub');
    Route::post('sub'              ,'Sub@save'  )->name('sub-save');
    Route::get( 'sub-show'         ,'Sub@show'  )->name('sub-show');
    Route::get( 'sub-edit/{id}'    ,'Sub@edit'  )->name('sub-edit');
    Route::post('sub-edit/{id}'    ,'Sub@store' )->name('sub-store');
    Route::get( 'sub-delete/{id}'  ,'Sub@delete')->name('sub-delete');

    #########################################################################################
    
    // Product

    ########################################################################################

    Route::get('prod'              ,'Products@index')->name('prod');
    Route::post('prod'             ,'Products@save')->name('prod-save');
    Route::get('prod-show'         ,'Products@show')->name('prod-show');
    Route::get('prod-edit/{id}'    ,'Products@edit')->name('prod-edit');
    Route::post('prod-edit/{id}'   ,'Products@store')->name('prod-store');
    Route::get('prod-delete/{id}'  ,'Products@delete')->name('prod-delete');

    #########################################################################################

    // Orders

    ########################################################################################

    Route::get('order'                ,'Orders@index' )->name('order');
    Route::get('comp-order'          ,'Orders@save'  )->name('comp-order');
    Route::get('order-edit/{id}'      ,'Orders@edit'  )->name('order-view');
    Route::post('order-edit/{id}'      ,'Orders@store' )->name('order-edit');
    Route::get('order-delete/{id}'    ,'Orders@delete')->name('order-delete');

    #########################################################################################


});


Route::get('/photo', function () { Artisan::call('storage:link'); });















