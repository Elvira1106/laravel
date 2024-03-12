<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/', function () {
    return view('auth.login');
})->name('login');



Route::post('/contact/all/{id}/update', 
'ContactController@updateMessageSubmit'
)->name('contact-update-submit');

Route::get('/contact/all/{id}/update', 
'ContactController@updateMessage'
)->name('contact-update');

Route::get('/contact/all/{id}/delete', 
'ContactController@deleteMessage'
)->name('contact-delete');


Route::get('/contact/all/{id}', 'ContactController@showOneMessage')->name('contact-data-one');
Route::get('/contact/all', 'ContactController@allData')->name('contact-data');
Route::post('/contact/submit', 'ContactController@submit')->name('contact-form');
Auth::routes();
Route::group(['middleware' => ['admin']], function () {
    Route::get('/test', function () {
        return view('test');
    })->name('test');
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 //Auth::routes();
 Route::post('/login/submit', [App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login-submit');
 