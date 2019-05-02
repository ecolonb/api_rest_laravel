<?php

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

//

// Route::post('register', 'AuthController@register');

// Route::post('login', 'AuthController@login');

// Route::post('recover', 'AuthController@recover');

Route::post('login', function (Request $request) {
    return response()->json(['ok' => true, 'mssg' => 'Secure ApiREST', 'token' => 'abcd123'], 200);
});

Route::group(['middleware' => ['AuthKey']], function () {

    Route::get('testauth', function () {
        return response()->json(['ok' => true, 'mssg' => 'Secure ApiREST']);
    });

    Route::post('users/test', function (Request $request) {
        return response()->json(['ok' => true, 'mssg' => 'Hello world!']);
    });
});
