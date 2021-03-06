<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\NoteController;
//parsisiuntimui reikalingas controller
use App\Http\Controllers\DownloadController;

//darbas su failais
use App\Http\Controllers\FileController;
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

Route::middleware(['AdminAccess'])->group(function () {
    Route::resource('/products', ProductController::class)->middleware(['AdminAccess']);
});

//visi routes su tasks
Route::resource('/tasks', TasksController::class);

Route::get('/',function (){
    return view('welcome');
    });


// Route::resource('/notes', NoteController::class); 

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
// Route::redirect('/','notes');

Route::get('notes_list',  [NoteController::class, 'index'])->middleware(['auth'])->name('notes_list');
//leidziama tik admin
//Route::middleware(['AdminAccess'])->group(function () {
    Route::resource('/notes', NoteController::class)->middleware(['AdminAccess']);
//});

//failai
Route::get('file', [FileController::class, 'create']); 
Route::post('file', [FileController::class, 'store']); 

//parsisiuntimai
Route::get('viewfiles', [DownloadController::class, 'index']);

Route::get('get/{file_name}', [DownloadController::class, 'getfile'])->middleware(['auth']);