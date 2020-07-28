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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/formRequest', 'HomeController@formRequest');
Route::post('/saveRequest', 'HomeController@saveRequest');
Route::get('/draft', 'HomeController@getDraft');

Route::group(['middleware' => ['auth']], function(){

    Route::prefix('dashboard')->group(function () {
        Route::get('/','HomeDashBoardController@index');

        Route::group(['middleware' => ['isAdmin']], function(){
            Route::get('/requests', 'RequestController@index');

            Route::resource('user', 'UserController')->only([
                'index','create', 'store'
            ]);
            Route::resource('step', 'StepController')->only([
                'index','create', 'store'
            ]);
            Route::resource('requestType', 'RequestTypeController')->only([
                'index','create', 'store'
            ]);

        });
        Route::get('home','HomeDashBoardController@index');

        Route::get('/myRequest', 'RequestController@myRequest')->middleware('ifStep');
        Route::get('/approveRequest/{requestId}/{status}', 'RequestController@approveRequest')->middleware('ifStep');

    });



});
