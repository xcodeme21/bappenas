<?php

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

Route::get('/', 'Auth\LoginController@login_form');
Route::get('/', 'Auth\LoginController@login_form')->name('login');
Route::post('/masuk', 'Auth\LoginController@masuk')->name('masuk');
Route::post('/reloadcaptcha', 'Auth\LoginController@reloadCaptcha');
Route::post('/logout', 'Auth\LoginController@logout')->middleware('auth')->name('logout');


Route::group(['namespace'=>'Backend', 'prefix'=>'backend', 'middleware'=>'auth'], function(){
    Route::get('dashboard','DashboardController@dashboard')->name('dashboard');
    
    
	Route::group(['middleware'=>"is_admin"], function() { 
		//Data User------------------------------------------------------------
		Route::get('/user',
		[
		  'middleware' => 'auth',
		  'uses' => 'UserController@index'
		])->name('user');  

		Route::get('/user/data',
		[
		  'middleware' => 'auth',
		  'uses' => 'UserController@data'
		]);   

		Route::get('/user/tambah',
		[
		  'middleware' => 'auth',
		  'uses' => 'UserController@tambah'
		])->name('tambah-user');

		Route::post('/user/add',
		[
		  'middleware' => 'auth',
		  'uses' => 'UserController@add'
		])->name('add-user');  

		Route::get('/user/edit/{id}',
		[
		  'middleware' => 'auth',
		  'uses' => 'UserController@edit'
		])->name('edit-user');

		Route::post('/user/update',
		[
		  'middleware' => 'auth',
		  'uses' => 'UserController@update'
		])->name('update-user');

		Route::get('/user/hapus/{id}',
		[
		  'middleware' => 'auth',
		  'uses' => 'UserController@hapus'
		])->name('hapus-user');
		//-------------------------------------------------------------------------

    });


    
    
	Route::group(['middleware'=>"is_petugas"], function() { 

		//Surat Masuk------------------------------------------------------------
		Route::get('/surat-masuk',
		[
		  'middleware' => 'auth',
		  'uses' => 'SuratMasukController@index'
		])->name('surat-masuk');  
		//-------------------------------------------------------------------------

		//Surat Keluar------------------------------------------------------------
		Route::get('/surat-keluar',
		[
		  'middleware' => 'auth',
		  'uses' => 'SuratKeluarController@index'
		])->name('surat-keluar');  
		//-------------------------------------------------------------------------
		
	});
});