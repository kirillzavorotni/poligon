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

// Test
//Route::resource('rest', 'RestTestController')->names('restTest');

// Main
Route::get('/', function () {
    return view('welcome');
});

// Blog/Posts
Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function() {
    Route::resource('posts', 'PostController')->names('blog.posts');
});

// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Blog/Admin
$groupConfig = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog'
];
Route::group($groupConfig, function() {
    $methods = ['index', 'edit', 'store', 'create', 'update'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');
});
