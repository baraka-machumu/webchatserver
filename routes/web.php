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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return  \App\Http\Controllers\FriendController::checkFriendRequest(3);
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/user/search', 'UserController@searchUsers');

Route::get('/user/json/search', 'UserController@loadUsers');

Route::get('user/search/friend', 'UserController@index')->name('search');
Route::resource('user', 'UserController');

// ....................friend controller.................

Route::get('/friend/request/check','FriendController@checkFriend');

Route::resource('friend', 'FriendController');
Route::post('/friend/request/add','FriendController@addFriend');
Route::post('/friend/request/cancel','FriendController@cancelRequest');
Route::post('/friend/request/unfriend','FriendController@unFriend');
Route::post('/friend/request/accept','FriendController@acceptRequest');

