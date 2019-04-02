<?php
Auth::routes();
Route::group(['middleware'=>'auth'],function(){
  Route::get('/admin',['uses'=>'TestController@index'])->name('units.index');
  Route::get('{id}/show',['uses'=>'TestController@show'])->name('units.show');

  Route::get('create/',['uses'=>'TestController@create'])->name('units.create');
  Route::post('store',['uses'=>'TestController@store'])->name('units.store');

  Route::get('{id}/edit',['uses'=>'TestController@edit'])->name('units.edit');


  Route::put('{id}/update_pass',['uses'=>'TestController@update_pass'])->name('units.update_pass');
  Route::put('{id}/updateProfil',['uses'=>'TestController@updateProfil'])->name('units.updateProfil');
  Route::delete('{id}/delete',['uses'=>'TestController@delete'])->name('units.delete');
  Route::get('{id}/profil',['uses'=>'TestController@profil'])->name('units.profil');
  Route::get('/', ['uses'=>'HomeController@index'])->name('home');
  Route::post('send','TestController@send');
});

Route::get('/',['middleware'=>'auth','uses'=>'mainController@index']);
Route::post()