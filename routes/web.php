<?php

use App\Http\Controllers\UiController;
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
//ui
Route::get('/', 'UiController@index');
Route::get('/posts', 'UiController@blogposts');
Route::get('posts/{id}/details','UiController@detail');
Route::post('/post/like/{Id}','LikeDislikeController@like');
Route::post('/post/dislike/{postId}','LikeDislikeController@dislike');
Route::post('/post/comment/{postId}','CommentController@comment');
Route::post('/search_data','UiController@search');
Route::get('/searchCategories/{catId}','UiController@searchCat');


//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', 'admin\AdminDashboardController@index');

    //User
    Route::get('/users', 'admin\UserController@index');
    Route::get('users/{id}/edit', 'admin\UserController@edit');

    //Update
    Route::post('users/{id}/update', 'admin\UserController@update');
    //Delete
    Route::post('/users/{id}/delete', 'admin\UserController@delete');

    //skill
    Route::resource('skills', 'admin\SkillController');
    //projects
    Route::resource('projects', 'admin\projectController');
    //StudentCounts
    Route::get('student_counts', 'admin\StudentCountController@index');
    Route::post('student_counts', 'admin\StudentCountController@store');
    Route::post('student_counts/{id}/update', 'admin\StudentCountController@update');
    //Categories
    Route::resource('categories', 'admin\CategoryController');
    //Posts
    Route::resource('posts', 'admin\PostController');
    //hideShow
    Route::post('posts/{commentId}/comments','admin\PostController@hideShow');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
