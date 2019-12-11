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
    // 認証の不要なメソッド
    Route::match(["post", "options"], '/register/new_user', 'Auth\RegisterController@create');
    Route::match(["post", "options"], '/login', 'Auth\LoginController@login');


    Route::group(['middleware' => 'auth:api'], function () {
        // 認証の必要なメソッド
        Route::match(["post", "options"], '/logout', 'Auth\LoginController@logout');
        Route::apiResource('evaluation', 'Api\EvaluationController');
        Route::match(["get", "options"], '/dealing/get_status_trading', 'Api\DealingController@get_status_trading');
        Route::apiResource('dealing', 'Api\DealingController');

        Route::apiResource('commodity', 'Api\CommodityController');
        Route::match(["get", "options"], '/commodity/search/{id}', 'Api\CommodityController@search');

        Route::apiResource('user', 'Api\UserController');
        Route::match(["post", "options"], 'user/update_image/{id}', 'Api\UserController@update_image');

        Route::apiResource('chat_log', 'Api\ChatLogController');
    });
});
