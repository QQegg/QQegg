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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',['uses'=>'PostsController@index'])->middleware('admin');

Route::group(['prefix' => 'store'], function() {
    Route::get('/',['as'=>'storelist','uses'=>'StoresController@index']);
    Route::get('/create',['as'=>'storecreate','uses'=>'StoresController@create']);
    Route::post('/store',['as' => 'XS' ,'uses'=>'StoresController@store']);
    Route::get('/edit/{id}',['as'=>'storeedit','uses'=>'StoresController@edit']);
    Route::put('/update/{id}',['as'=>'storeupdate','uses'=>'StoresContreller@update']);
    Route::delete('/destroy/{id}',['as'=>'storedestroy','uses'=>'StoresContreller@destroy']);
});
Route::group(['prefix' => 'costomer'], function() {
    Route::get('/',['as'=>'coslist','uses'=>'CostomersController@index']);
    Route::get('/create',['as'=>'coscreate','uses'=>'CostomersController@create']);
    Route::post('/store',['as' => 'cosstore' ,'uses'=>'CostomersController@store']);
    Route::get('/edit/{id}',['as'=>'cosedit','uses'=>'CostomersController@edit']);
    Route::put('/update/{id}',['as'=>'cosupdate','uses'=>'CostomersController@update']);
    Route::delete('/destroy/{id}',['as'=>'cosdestroy','uses'=>'CostomerController@destroy']);
});
Route::group(['prefix' => 'product'], function() {
    Route::get('/',['as'=>'prolist','uses'=>'ProductsController@index']);
    Route::get('/create',['as'=>'procreate','uses'=>'ProductsController@create']);
    Route::post('/store',['as' => 'prostore' ,'uses'=>'ProductsController@store']);
    Route::get('/edit/{id}',['as'=>'proedit','uses'=>'ProductsController@edit']);
    Route::patch('/update/{id}',['as'=>'proupdate','uses'=>'ProductsController@update']);
    Route::delete('/destroy/{id}',['as'=>'prodestroy','uses'=>'ProductsController@destroy']);
});

Route::group(['prefix' => 'notification'], function() {
    Route::get('/',['as'=>'notilist','uses'=>'NotificationsController@index']);
    Route::get('/create',['as'=>'noticreate','uses'=>'NotificationsController@create']);
    Route::post('/store',['as' => 'notistore' ,'uses'=>'NotificationsController@store']);
    Route::get('/edit/{id}',['as'=>'notiedit','uses'=>'NotificationsController@edit']);
    Route::put('/update/{id}',['as'=>'notiupdate','uses'=>'NotificationsController@update']);
    Route::delete('/destroy/{id}',['as'=>'notidestroy','uses'=>'NotificationsController@destroy']);
});

Route::group(['prefix' => 'push'], function() {
    Route::get('/',['as'=>'pushlist','uses'=>'PushsController@index']);
    Route::get('/create',['as'=>'pushcreate','uses'=>'PushsController@create']);
    Route::post('/store',['as' => 'pushstore' ,'uses'=>'PushsController@store']);
    Route::get('/edit/{id}',['as'=>'pushedit','uses'=>'PushsController@edit']);
    Route::get('/view/{id}',['as'=>'pushview','uses'=>'PushsController@view']);
    Route::patch('/update/{id}',['as'=>'pushupdate','uses'=>'PushsController@update']);
    Route::delete('/destroy/{id}',['as'=>'pushdestroy','uses'=>'PushsController@destroy']);
});
Route::group(['prefix' => 'coupon'], function() {
    Route::get('/',['as'=>'coulist','uses'=>'CouponsController@index']);
    Route::get('/create',['as'=>'coucreate','uses'=>'CouponsController@create']);
    Route::post('/store',['as' => 'coustore' ,'uses'=>'CouponsController@store']);
    Route::get('/edit/{id}',['as'=>'couedit','uses'=>'CouponsController@edit']);
    Route::get('/view/{id}',['as'=>'couview','uses'=>'CouponsController@view']);
    Route::patch('/update/{id}',['as'=>'couupdate','uses'=>'CouponsController@update']);
    Route::delete('/destroy/{id}',['as'=>'coudestroy','uses'=>'CouponsController@destroy']);
});
Route::group(['prefix' => 'evaluation'], function() {
    Route::get('/',['as'=>'evalist','uses'=>'EvaluationsController@index']);
    Route::get('/create',['as'=>'evacreate','uses'=>'EvaluationsController@create']);
    Route::post('/store',['as' => 'evastore' ,'uses'=>'EvaluationsController@store']);
    Route::get('/edit/{id}',['as'=>'evaedit','uses'=>'EvaluationsController@edit']);
    Route::put('/update/{id}',['as'=>'evaupdate','uses'=>'EvaluationsController@update']);
    Route::delete('/destroy/{id}',['as'=>'evadestroy','uses'=>'EvaluationsController@destroy']);
});
Route::group(['prefix' => 'bulletin'], function() {
    Route::get('/',['as'=>'bullist','uses'=>'BulletinsController@index']);
    Route::get('/create',['as'=>'bulcreate','uses'=>'BulletinsController@create']);
    Route::post('/store',['as' => 'bulstore' ,'uses'=>'BulletinsController@store']);
    Route::get('/edit/{id}',['as'=>'buledit','uses'=>'BulletinsController@edit']);
    Route::put('/update/{id}',['as'=>'bulupdate','uses'=>'BulletinsController@update']);
    Route::delete('/destroy/{id}',['as'=>'buldestroy','uses'=>'BulletinsController@destroy']);
});
Route::group(['prefix' => 'comment'], function() {
    Route::get('/',['as'=>'comlist','uses'=>'CommentsController@index']);
    Route::post('/store',['as' => 'comstore' ,'uses'=>'CommentsController@store']);
    Route::get('/edit/{id}',['as'=>'comedit','uses'=>'CommentsController@edit']);
    Route::post('/update/{id}',['as'=>'comupdate','uses'=>'CommentsController@update']);
    Route::get('/destroy/{id}',['as'=>'comdestroy','uses'=>'CommentsController@destroy']);
});
/*完工*/
Route::group(['prefix' => 'post'], function() {
    Route::get('/',['as'=>'postlist','uses'=>'PostsController@index']);
    Route::post('/store',['as' => 'poststore' ,'uses'=>'PostsController@store']);
    Route::get('/edit/{id}',['as'=>'postedit','uses'=>'PostsController@edit']);
    Route::post('/update/{id}',['as'=>'postupdate','uses'=>'PostsController@update']);
    Route::get('/destroy/{id}',['as'=>'postdestroy','uses'=>'PostsController@destroy']);
});




