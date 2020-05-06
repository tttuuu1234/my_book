<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;

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

// Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'admin'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('login/github', 'Auth\GithubLoginController@redirectToGithub')->name('login.github');
    Route::get('/login/github/callback', 'Auth\GithubLoginController@handleProviderCallback')->name('login.github.callback');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/category', 'CategoryController@getCategories')->name('category');
    Route::get('/categoryList', 'CategoryController@getCategoryList')->name('category.list');

    Route::get('/books', 'BookController@getBooks')->name('books');
    Route::get('/book', 'BookController@searchBooks')->name('search.books');
    Route::get('/book/category', 'BookController@getCategoryMatchBooks')->name('category.match.books');
    Route::post('/book', 'BookController@registerBooks')->name('register.books');

    Route::get('/home', 'HomeController@index')->name('home');
});
