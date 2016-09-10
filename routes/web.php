<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| 后台路由设置 routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin','namespace' => 'Admin','as' => 'admin.'], function () {
    // 后台首页设置BEGIN
    Route::get ('/login'                        , 'AuthController@getLogin'              )->name('login');
    Route::post('/login'                        , 'AuthController@postLogin');
    // 后台首页设置EN
});
Route::group(['prefix' => 'admin','namespace' => 'Admin','as' => 'admin.',
    // 'middleware' => 'auth'
    ], function () {
    Route::get ('/logout'                       , 'AuthController@getLogout'            )->name('logout');
	// 后台首页设置BEGIN
    Route::get ('/'			                    , 'IndexController@index'	            )->name('index');
    // 后台首页设置EN
    // 后台系统设置BEGIN
    Route::get ('/system/{group?}'	            , 'SystemController@index'	            )->name('system');
    Route::post('/system'                       , 'SystemController@store'              );

    Route::get ('/nav'		                    , 'NavController@index'		            )->name('nav');
    Route::get ('/link'		                    , 'LinkController@index'	            )->name('link');

    Route::get ('/config/add'                   , 'ConfigController@add'                )->name('config.add');
    Route::get ('/config/edit/{id?}'            , 'ConfigController@edit'               )->name('config.edit');
    Route::get ('/config/status/{status}'       , 'ConfigController@setStatus'          )->name('config.status');
    Route::post('/config/status/{status}'       , 'ConfigController@setStatus'          );
    Route::post('/config/store'                 , 'ConfigController@store'              )->name('config.store');
    Route::post('/config/upload'                , 'ConfigController@upload'             )->name('config.upload');
    Route::get ('/config/{group?}'              , 'ConfigController@index'              )->name('config');

    Route::get ('/upload'	                    , 'UploadController@index'	            )->name('upload');
    Route::get ('/upload/edit/{id?}'            , 'UploadController@edit'               )->name('upload.edit');
    Route::get ('/upload/status/{status}'       , 'UploadController@setStatus'          )->name('upload.status');
    Route::post('/upload/status/{status}'       , 'UploadController@setStatus'          );
    Route::post('/upload/store'                 , 'UploadController@store'              )->name('upload.store');
    Route::post('/upload/upload'                , 'UploadController@upload'             )->name('upload.upload');
    Route::post('/upload'                       , 'UploadController@postImageUpload'    );
    // 后台系统设置END

    // 应用中心BEGIN
    Route::get('/model'                         , 'ModelController@index'               )->name('model');
    Route::get('/addon'                         , 'UploadController@setStatus'          )->name('addon');
    Route::get('/theme'                         , 'UploadController@setStatus'          )->name('theme');
    // 应用中心END

});
