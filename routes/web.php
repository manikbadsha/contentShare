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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//FrontendController

Route::get('/', 'FrontendController@index');
Route::get('story/index', 'FrontendController@Story');


//UserController

Route::get('user/register', 'UserController@register');
Route::post('user/profile/register', 'UserController@UserRegister');
Route::get('user/Profile', 'UserController@UserProfile');
Route::post('update/user/info', 'UserController@UserProfileUpdate');


//StoryController

Route::get('add/stories', 'StoryController@AddStory');
Route::post('Add/new/story', 'StoryController@AddNewStory');
Route::get('view/story/user', 'StoryController@ViewStory');
Route::get('delete/story/{id}', 'StoryController@deleteStory');
Route::get('edit/story/{id}', 'StoryController@EditStory');
Route::post('update/new/story', 'StoryController@UpdateStory');
Route::post('add/comment/{id}', 'StoryController@AddComment');


//AdminController

Route::get('view/story', 'AdminController@ViewStory');
Route::get('user/data', 'AdminController@ajax');
Route::get('listed/story', 'AdminController@ListedStory');
Route::get('blocked/story/{id}', 'AdminController@BlockedStory');
Route::get('unlisted/story', 'AdminController@unListedStory');
Route::get('unblocked/story/{id}', 'AdminController@UnBlockedStory');
Route::get('comments/story', 'AdminController@ShowComments');
Route::get('delete/comment/{id}', 'AdminController@DeleteComments');
Route::get('user/list', 'AdminController@ViewUserList');
Route::get('block/user/{id}', 'AdminController@BlockUserList');
Route::get('admin/list', 'AdminController@AdminList');
Route::post('admin/register', 'AdminController@AddAdmin');
Route::get('delete/admin/{id}', 'AdminController@deleteAdmin');
