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
Route::options('{all}', function () {
    $response = Response::make('');
    return $response;
});

Route::group(["middleware" => "cors"], function () {
    Route::group(["middleware" => "api"], function () {
        Route::match(["post", "options"], '/login', 'Auth\LoginController@login');
        Route::match(["get", "options"], '/evaluation/{id}', 'Api\EvaluationController@show');
    });
});
