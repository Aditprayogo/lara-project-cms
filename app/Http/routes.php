<?php

use App\User;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::group(['namespace' => 'Admin'], function () {
	Route::group(['middleware' => 'admin'] ,function(){
		Route::resource('/admin/users', 'AdminUsersController');
		Route::resource('/admin/posts', 'AdminPostsController');
		Route::resource('/admin/categories', 'AdminCategoriesController');
		Route::resource('/admin/medias', 'AdminMediasController');
		Route::resource('/admin/comments', 'PostCommentsController');
		Route::delete('comments/delete', [
			'as' => 'comments.delete', 
			'uses' => 'PostCommentsController@deleteComments'
		] );
		Route::delete('media/delete', [
			'as' => 'media.delete' , 
			'uses' => 'AdminMediasController@deleteMedia'
		]);
		Route::delete('posts/delete', [
			'as' => 'posts.delete', 
			'uses' => 'AdminPostsController@deletePosts'
		]);
		Route::get('/admin', 'AdminController@index');
		Route::get('/admin/profile', 'AdminController@profile');
	});
});

Route::get('/post/{id}', [    
    'as' => 'home.post', 'uses' => 'AdminPostsController@post'
]);

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/admin/comment/replies', 'CommentRepliesController');
});