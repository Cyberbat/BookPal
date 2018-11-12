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

Route::get('/home', 'HomeController@index')->name('home');


//Threads

// Route::resource('threads','ThreadController');
Route::get('/threads', 'ThreadController@index');
Route::post('/threads', 'ThreadController@store');
Route::get('/threads/create', 'ThreadController@create');

//show thread
Route::get('/threads/{channel}/{thread}', 'ThreadController@show');
//Delete Thread
Route::delete('/threads/{channel}/{thread}', 'ThreadController@destroy');

Route::get('threads/{channel}','ThreadController@index');

Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store');

//Replies
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}', 'ReplyController@destroy');

//User Profile
Route::get('/profile/{user}', 'ProfileController@show');

//Books

Route::get('/book/{books}', 'BooksController@show');

//Contacts

Route::get('/contacts', 'ContactsController@get');

//Message Dis
Route::get('/messages', function () {
    return view('messages.message');
});

//Convo
Route::get('/conversation/{id}', 'ContactsController@getMessages');

//Convo send
Route::post('conversation/send', 'ContactsController@send');



