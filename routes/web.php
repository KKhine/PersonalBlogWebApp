<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// UI
Route::get('/','UiController@index');
Route::get('/post',"UiController@postIndex");
Route::get('/post/{id}/detail',"UiController@postDetail");

Route::post('/post/like/{postId}','LikeDislikeController@like');
Route::post('/post/dislike/{postId}','LikeDislikeController@dislike');

Route::post('/post/comment/{postId}','CommentController@commentIndex');


// ADMIN
Route::group(['prefix' => 'admin','middleware'=>['auth','isAdmin']], function () {
    Route::get('/dashboard','admin\AdminDashboardController@index');
    Route::get('/user','admin\UserController@index');
    Route::get('/user/{id}/edit','admin\UserController@edit');
    Route::post('/user/{id}/update','admin\UserController@update');
    Route::post('/user/{id}/delete','admin\UserController@delete');

    // SKILL
    Route::resource('skill', 'admin\SkillController');

    // PROJECT
    Route::resource('project', 'admin\ProjectController');

    //STUDENT
    Route::get('student','admin\StudentCountController@index');
    Route::post('student/store','admin\StudentCountController@store');
    Route::post('student/{id}/update','admin\StudentCountController@update');

    //CATEGORY
    Route::resource('category', 'admin\CategoryController');

    // POST
    Route::resource('post', 'admin\PostController');
    Route::post('comment/{commentId}/show_hide','admin\PostController@showHideComment');

    // LIKE DISLIKE
    
}

    
);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
