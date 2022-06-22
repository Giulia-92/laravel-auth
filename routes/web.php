<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
    //return view('guest.home');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')
->namespace('Admin') // i controller saranno dentro lo stesso namespace (http > controllers > Admin > HomeController)
->name('admin.') // quando lo richiamo nelle blade sarà route(‘admin.home’)
->prefix('admin') // sarebbe localhost:8080/admin/home
->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/posts','PostController');
});
Route::get("{any?}",function() {
    return view("guest.home");
})->where('any',".*");
