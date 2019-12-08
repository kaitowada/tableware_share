<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
// Route::options('{all}', function () {
//     $response = Response::make('');
//     return $response;
// });

Route::group(["middleware" => "api"], function () {
    Route::match(["get", "options"], '/evaluation/{id}', 'Api\EvaluationController@show');
    Route::match(["get", "options"], '/dealing/get_status_trading', 'Api\DealingController@get_status_trading');

    Route::match(["put", "options"], 'user/{id}', 'Api\UserController@update');
    Route::match(["post", "options"], 'user/update_image/{id}', 'Api\UserController@update_image');
});
