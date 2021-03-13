<?php

// use Illuminate\Support\Facades\DB;

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

Route::get('/', 'SwitchRandomController@index');
Route::get('/image/{image_id}', 'SwitchRandomController@show');

Route::get('/result', 'SwitchRandomResultController@result');
// Route::get('/result',function (Request $request) {
	
// 	$release_maker_name = $request->release_maker_name;
	
// 	return response()->json(['release_maker_name' => $release_maker_name]);

// });
// Route::get('/result', function () {
//     return view('welcome');
// })->where('any','.*');
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('users',function(){
// 	return ['Ken','Mike','John','Lisa'];	
// });

// Route::get('/users',function(){
// 	return App\User::all();
// });

// Route::get('/users',function(){
// 	return DB::table('switch_software_releasemaker_gamecount');
// });