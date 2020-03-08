<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth.jwt')->post('/quote',
  array(
'uses'=>'QuoteController@postQuote'
));
Route::get('/quotes',
[
'uses'=>'QuoteController@getQuotes'
]);
Route::middleware('auth.jwt')->put('/quote/{id}',[
'uses' =>'QuoteController@putQuote'
]);
Route::middleware('auth.jwt')->delete('/quote/{id}',[
  'uses' =>'QuoteController@deleteQuote'
]);
Route::middleware('auth.jwt')->post('/quote',
  array(
'uses'=>'QuoteController@postQuote',
));
Route::post('/user',
array('uses' => 'UserController@signup')
);

