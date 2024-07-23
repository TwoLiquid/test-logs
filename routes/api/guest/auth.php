<?php

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

Route::group(['namespace' => 'Api'], function () {

    /**
     * Guest namespace
     */
    Route::group([
        'namespace'  => 'Guest',
        'middleware' => [
            'auth.apikey'
        ]
    ], function () {

        /**
         * Auth namespace
         */
        Route::group([
            'namespace' => 'Auth',
            'prefix'    => 'auth'
        ], function () {

            /**
             * Provides api access test
             */
            Route::get('test', 'AuthController@test')
                ->name('api.auth.test');
        });
    });
});
