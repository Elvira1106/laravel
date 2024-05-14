<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController1;
use App\Http\Controllers\PostController;
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
Route::view('/home', 'home');

Route::view('/about', 'about')->name('about');

Route::view('/', 'auth.login')->name('login');

Route::resources([
    'contact' => ContactController1::class,
    'post' => PostController::class,
]);



Auth::routes();
Route::group(['middleware' => ['admin']], function () {                                                                     
   
    Route::view('/test', 'test')->name('test');
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 