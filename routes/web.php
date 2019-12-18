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

//Route::pattern('url', '.*');

Route::get('/', 'WelcomeController')->name('home');

Route::get('/verified/{token}', function($token){
	$model = \TableEmployeeModel::where('verification_token', $token);
	$check = $model->first();
	if($check){
		$model->update(['verification_token' => null, 'verification_employee' => '1']);
		
		return view('verified');	      
	}
	return redirect("/re-verification");   		
});

Route::get('/re-verification', function(){
	return view('re-verification');	      
})->name('re-verification');


Route::get('/{any}', function($token){
	return redirect('/');      
})->where('any', '.*');
