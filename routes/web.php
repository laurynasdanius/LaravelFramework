<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;
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
Route::get('/page1', function () {
    return view('page1.app');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//kvieciamas book controller
Route::resource('/books',BookController::class);


Route::resource('/products', ProductController::class);

Route::get('mail', [MailController::class, 'plain_email']);
Route::get('mail_html', [MailController::class, 'html_email']); 
require __DIR__.'/auth.php';