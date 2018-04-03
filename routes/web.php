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

Route::get('/test',function ()
{
    \App\Store::create([
        'name' => '文具店',
        'email' => 'www@gmail.com',
        'contact' => '小王',
        'phone' => '0988045436',
        'address' => '台中市',
        'password'=>Hash::make('wwwwww'),
        'title'=>'fuck',
    ]
    );
}
);

Route::get('/xd',function ()
{
    \App\Admin::create([
            'account' => 'www',
            'email' => 'www@gmail.com',
            'password'=>Hash::make('wwwwww'),
        ]
    );
}
);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('index.index');
})->name('index');

Route::prefix('user')->group(function () {
    Route::get('change/profile', ['as' => 'user_change_profile', 'uses' => 'UserChangeMemberController@profile']);
    Route::post('change/profile', ['as' => 'user_change_profile', 'uses' => 'UserChangeMemberController@update']);
    Route::get('change/password', ['as' => 'user_change_password', 'uses' => 'UserChangeMemberController@password']);
    Route::post('change/password', ['as' => 'user_change_password', 'uses' => 'UserChangeMemberController@change_password']);
});

Route::prefix('store')->group(function () {
    Route::get('/', 'StoresController@index')->name('store.dashboard');
    Route::get('/create',['as'=>'storecreate','uses'=>'StoresController@create']);
    Route::post('/store',['as' => 'XS' ,'uses'=>'StoresController@store']);
    Route::get('/edit/{id}',['as'=>'storeedit','uses'=>'StoresController@edit']);
    Route::put('/update/{id}',['as'=>'storeupdate','uses'=>'StoresContreller@update']);
    Route::delete('/destroy/{id}',['as'=>'storedestroy','uses'=>'StoresContreller@destroy']);
    Route::get('/login', 'Auth\StoreLoginController@showLoginForm')->name('store.login');
    Route::post('/login', 'Auth\StoreLoginController@login')->name('store.login.submit');
    Route::post('/login', 'Auth\StoreLoginController@login')->name('store.login.submit');
    Route::get('change/profile', ['as' => 'store_change_profile', 'uses' => 'StoreChangeMemberController@profile']);
    Route::post('change/profile', ['as' => 'store_change_profile', 'uses' => 'StoreChangeMemberController@update']);
    Route::get('change/password', ['as' => 'store_change_password', 'uses' => 'StoreChangeMemberController@password']);
    Route::post('change/password', ['as' => 'store_change_password', 'uses' => 'StoreChangeMemberController@change_password']);
});

//Route::get('/admin',['uses'=>'PostsController@index'])->middleware('admin');
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/search/{id}',['as' => 'admin.status', 'uses' => 'AdminController@update']);
    Route::get('/search', ['as' => 'admin.index', 'uses' => 'AdminController@Show']);
    Route::get('/view/{id}',['as'=>'admin.admin-store-view','uses'=>'AdminController@view']);
    Route::patch('/update/{id}',['as'=>'admin_store_change_password','uses'=>'AdminController@change_password']);
});

Route::get('/appconnecttest','NotificationsController@test');

//auth認證登入
Route::group(['middleware'=>'auth:store'], function() {

    Route::group(['prefix' => 'product'], function() {
        Route::get('/',['as'=>'prolist','uses'=>'ProductsController@index']);
        Route::get('/create',['as'=>'procreate','uses'=>'ProductsController@create']);
        Route::post('/store',['as' => 'prostore' ,'uses'=>'ProductsController@store']);
        Route::get('/detail/{id}',['as'=>'prodetail','uses'=>'ProductsController@detail']);
        Route::get('/edit/{id}',['as'=>'proedit','uses'=>'ProductsController@edit']);
        Route::patch('/update/{id}',['as'=>'proupdate','uses'=>'ProductsController@update']);
        Route::delete('/destroy/{id}',['as'=>'prodestroy','uses'=>'ProductsController@destroy']);
    });



});

Route::group(['prefix' => 'sale'], function() {
    Route::get('/creat',['as'=>'salecreat','uses'=>'TransactionsController@readycheck']);
    Route::post('/costomer',['as' => 'costomersave' ,'uses'=>'TransactionsController@cotomer']);
    Route::post('/per',['as' => 'prestore' ,'uses'=>'TransactionsController@prestore']);
    Route::post('/store',['as' => 'salestore' ,'uses'=>'TransactionsController@store']);
    Route::post('/checkout',['as'=>'checkout','uses'=>'TransactionsController@checkout']);
});

Route::get('/appconnecttest','NotificationsController@test');


Route::group(['prefix' => 'costomer'], function() {
    Route::get('/',['as'=>'coslist','uses'=>'CostomersController@index']);
    Route::get('/create',['as'=>'coscreate','uses'=>'CostomersController@create']);
    Route::post('/store',['as' => 'cosstore' ,'uses'=>'CostomersController@store']);
    Route::get('/edit/{id}',['as'=>'cosedit','uses'=>'CostomersController@edit']);
    Route::put('/update/{id}',['as'=>'cosupdate','uses'=>'CostomersController@update']);
    Route::delete('/destroy/{id}',['as'=>'cosdestroy','uses'=>'CostomerController@destroy']);
});

Route::group(['prefix' => 'category'], function() {
    Route::get('/',['as'=>'catelist','uses'=>'CategorysController@index']);
    Route::get('/create',['as'=>'catecreate','uses'=>'CategorysController@create']);
    Route::post('/store',['as' => 'catestore' ,'uses'=>'CategorysController@store']);
    Route::get('/edit/{id}',['as'=>'cateedit','uses'=>'CategorysController@edit']);
    Route::patch('/update/{id}',['as'=>'cateupdate','uses'=>'CategorysController@update']);
    Route::delete('/destroy/{id}',['as'=>'catedestroy','uses'=>'CategorysController@destroy']);
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

