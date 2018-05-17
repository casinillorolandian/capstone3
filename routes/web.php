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


// Only the login can only view
Route::group(['middleware' => 'auth'], function() {


// messaging routes
Route::get('/messages','MessagesController@showMessages');

Route::get('/messages/create', 'MessagesController@create');

Route::get('messages/{id}', 'MessagesController@show');

Route::post('/messages/create', 'MessagesController@store');

Route::get('messages/{id}/delete', 'MessagesController@delete');

Route::post('messages/{id}', 'MessagesController@postComment');

Route::get('messages/{id}/replied', 'MessagesController@replied');




Route::get('/profile', 'HomeController@profile');

Route::post('/profile', 'HomeController@update_avatar');



Route::get('/changePassword','HomeController@showChangePasswordForm');

Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

// Edit to be seen by guest from here
Route::get('/catalogue','ItemController@showItems');

//category
Route::post('/catalogue', 'ItemController@categorylist');

// Search
Route::post('/searchitems','ItemController@search');
// ends here

});

// accessible only by admin
Route::group(['middleware' => 'is.admin'], function () {

Route::get('/settings','MessagesController@showUsers');

//catalogue route
Route::get('/catalogue/create', 'ItemController@create');

Route::post('/catalogue/create', 'ItemController@store');

Route::get('catalogue/{id}/delete', 'ItemController@delete');

Route::get('catalogue/update/{id}', 'ItemController@update');
Route::post('catalogue/update/{id}', 'ItemController@updatedata');

// sold and reserve
Route::get('catalogue/{id}/solditem', 'ItemController@solditem');
Route::get('catalogue/{id}/unreserve', 'ItemController@unreserve');

//delete item
Route::get('catalogue/{id}/delete', 'ItemController@delete');

Route::get('/reserveitem','ItemController@showReserve');

Route::get('/messages/show/deletedmessages','MessagesController@showDeletedMessages');



// Spam messages
Route::get('messages/{id}/spam', 'MessagesController@spam');

Route::get('/messages/show/spammedmessages','MessagesController@showSpammedMessages');
});


// catalogue routes


Route::get('catalogue/{id}', 'ItemController@show');





Route::post('messages/{id}', 'MessagesController@postComment');




//Reserve
Route::get('messages/reserve/{id}', 'ItemController@reserve');



