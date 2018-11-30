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

//show Blog
Route::get('/threads/{channel}/{thread}', 'ThreadController@show');
Route::patch('/threads/{channel}/{thread}', 'ThreadController@update');

//Delete Blog

Route::delete('/threads/{channel}/{thread}', 'ThreadController@destroy');

Route::get('threads/{channel}','ThreadController@index');

Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store');

//Replies
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}', 'ReplyController@destroy');

//User Profile
Route::get('/profile/{user}', 'ProfileController@show');

//Books
Route::get('/books/{genre}/{books}', 'BooksController@show');
Route::get('/books/create', 'BooksController@create');
Route::post('/books', 'BooksController@store');
Route::delete('/books/{books}', 'BooksController@destroy');

Route::get('/books/{genre}', 'BooksController@index');

//Add book Images
Route::post('api/books/{book}/bookimage', 'Api\ImageBooksController@store');

//Update the User Bio
Route::post('/user/bio', 'ProfileController@editBio');

//Update the User Quote
Route::post('/user/quote', 'ProfileController@editquote');

//Contacts

Route::get('/contacts', 'ContactsController@get');

//Message Dis
Route::get('/messages', 'ContactsController@index');

//Convo
Route::get('/conversation/{id}', 'ContactsController@getMessages');

//Convo send
Route::post('conversation/send', 'ContactsController@send');

//Add avatar for Profile
Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->name('avatar');


//User Notifications
Route::get('profile/{user}/notifications', 'UserNotificationController@index');

Route::post('profile/notifications/{bookowner}/{user}/{booksid}', 'UserNotificationController@bookreq');

Route::get('/acceptnot/{book}/{user}', 'UserNotificationController@returnconfim');


//Crawler
Route::get('crawler/data', 'BookCrawlController@show')->middleware('auth');

// Route::delete('profile/notifications/{user}/{notificationid}', 'UserNotificationController@destroy');

//Google Maps

Route::get('/maps',function(){
	    $config['center'] = '33.8928984, 35.4782996';
    $config['zoom']='10';
    $config['map_height']='500px';
    $config['geocodeCaching']=true;
    $config['scrollwheel']=true;

    

    GMaps::initialize($config);

    $marker['position'] ='33.8928984, 35.4782996';
    $marker['infowindow_content'] ='Book Shelter Alpha';

    GMaps::add_Marker($marker);

    $marker['position'] ='34.115022, 35.6711205';
    $marker['infowindow_content'] ='Book Shelter Beta';

    GMaps::add_Marker($marker);

    $map =GMaps::create_map();

    return view('maps.booksmaps')->with('map',$map);

});


//search

Route::get('/search', [
    'as' => 'api.search',
    'uses' => 'ApiSearchController@search'
]);
