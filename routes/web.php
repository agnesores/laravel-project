<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('blog','App\Http\Controllers\BlogController');
Route::resource('category','App\Http\Controllers\CategoryController');
Route::resource('comment','App\Http\Controllers\CommentController');
Route::resource('us','App\Http\Controllers\UserController');

Route::post('/friend/send/{user}', 'App\Http\Controllers\FriendController@send')->name('friend.send');
Route::post('/friend/accept/{request}', 'App\Http\Controllers\FriendController@accept')->name('friend.accept');
Route::get('/friend/requests', 'App\Http\Controllers\FriendController@showFriendRequests')->name('friend.requests');
Route::post('/friend/reject/{request}', 'App\Http\Controllers\FriendController@rejectFriendRequest')->name('friend.reject');
Route::get('/friend/accepted-requests', 'App\Http\Controllers\FriendController@viewAcceptedFriendRequests')->name('friend.accepted-requests');
Route::delete('/friend/{id}', 'App\Http\Controllers\FriendController@deleteFriend')->name('friend.delete');

Route::post('user/{user}', 'UserController@showUserProfile');
Route::post('/users/{user}/assign-admin', [UserController::class, 'assignAdmin'])->name('users.assign-admin');
Route::post('/users/{user}/assign-employee', [UserController::class, 'assignEmployee'])->name('users.assign-employee');
Route::post('/users/{user}/remove-role', [UserController::class, 'removeRole'])->name('users.remove-role');
