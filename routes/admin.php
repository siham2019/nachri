<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('admin.login');
})->name('login')->middleware('guest:admin');

Route::post('/login', 'App\Http\Controllers\adminController@login');

Route::group(['namespace'=>'App\Http\Controllers','middleware'=>'auth:admin'],function () {
    
    Route::get('/dashboard', function () {
        return view('admin.auth.dashboard');
    })->name('dashboard');

    Route::get('/services', function () {
        return 'services';
    });

/* #################################################################################
   #                               Language                                         #
   #                                       routes                                   #
   #################################################################################
*/




  Route::group(['prefix'=>'language'],function () {
       
      Route::get('/', 'LanguageController@index');
      
      Route::get('/add','LanguageController@create');
      Route::post('/store','LanguageController@store')->name('store');

      Route::get('/edit/{id}','LanguageController@edit');
      Route::post('/update', 'LanguageController@update')->name('language.update');

      Route::get('/destroy/{id}','LanguageController@delete');
  });


/* #################################################################################
   #                               main categorie                                   #
   #                                            routes                              #
   #################################################################################
*/




Route::group(['prefix'=>'main-categorie'],function () {
       
    Route::get('/', 'MainCategorieController@index');
    Route::get('/add','MainCategorieController@create');
    Route::post('/add','MainCategorieController@store')->name('categorie.store');

});













});