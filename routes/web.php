<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\NoteController;

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


Route::get('/page1', function () {
    return view('page1.layouts.footer');
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

//duomenu isvedimas
// Route::get('/tasks', function()
// {
//    return view('DI.pages.tasks');
// });

//autorizacija
//Route::get('/dashboard',function(){
    // return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//Route::middleware(['AdminAccess'])->group(function (){
    // Route::resource('/products',ProductController::class)->middleware(['AdminAccess']);
// })
Route::middleware(['AdminAccess'])->group(function () {
    Route::resource('/products', ProductController::class)->middleware(['AdminAccess']);
});

//visi routes su tasks
Route::resource('/tasks', TasksController::class);

// Route::redirect('/','lt');

Route::resource('/notes', NoteController::class); 
//route group kuri prides /en arba /lt prie routes
// Route::group(['prefix'=>'{language}'],function (){
    //visi routes su notes
    // Route::resource('/notes', NoteController::class); 
    //testinis
//     Route::get('/',function (){
//         return view('welcome');
//     });

// });

// Route::get('/{locale?}', function ($locale = null) {
//     if (isset($locale) && in_array($locale, config('app.available_locales'))) {
//         app()->setLocale($locale);
//     }
    
//     return view('welcome');
// });
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::redirect('/','notes');