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


use Illuminate\Support\Facades\Auth;
Route::any('/wechat', 'WeChatController@serve');
Route::get('/install','InstallController@index');
Route::get('/install/db','InstallController@creteDatabase');
Route::get('/install/setadmin','InstallController@setAdmin');
Route::post('/install/db/init','InstallController@initDatabase');
Route::get('/channel/option','ChannelController@options');
Route::get('/category/option','CategoryController@options');
Route::any('/file/uploadPicture','FileController@uploadPicture');
Route::get('/image/show/{name}','ImageController@show');
Route::get('/excel','ExcelController@index');
Route::get('/taobao/app','TaobaoController@openApp');
Route::any('/taobao/client/collect','TaobaoController@saveClientCollect');
Route::any('/test','TestController@index');
Route::group(['middleware'=>['web','category']], function(){
    Auth::routes();
    Route::get('/go/{num_iid}','GoodsController@go');
    Route::get('/category/goods/{id?}/{sort?}/{desc?}','CategoryController@goods');
    Route::get('/category/lists','CategoryController@lists');
    Route::get('/category/{id}/{subId?}/{sort?}/{desc?}','CategoryController@category');
    Route::get('/channel/goods/{id?}','ChannelController@goods');
    Route::get('/channel/{id?}/{sort?}/{desc?}','ChannelController@channel');
    Route::get('/item/{id}', 'GoodsController@detail');
    Route::get('/info/{id}', 'GoodsController@info');
    Route::get('/search/goods/{keywords?}/{sort?}/{desc?}','SearchController@goods');
    Route::get('/search/coupon/{keywords?}/{page_no?}','SearchController@coupon');
    Route::get('/user/my','UserController@my');
    Route::get('/user/history','UserController@history');
    Route::get('/user/collections','UserController@collections');
    Route::get('/collect/{id?}','CollectController@collect');
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/{sort?}/{desc?}', 'IndexController@index')->name('home');
});