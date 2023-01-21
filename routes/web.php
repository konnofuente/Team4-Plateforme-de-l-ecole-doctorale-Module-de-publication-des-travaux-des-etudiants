<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('pages.deposit_file');
// });


//For GETTING homepage//
Route::get('/', function () {
    return view('pages.Home');
});

Route::get('/Submit', function () {
    return view('pages.Submit');
})->name('submit');

//Handling The submission of the form //
Route::post('/Submit', [FileController::class, 'store'])->name('file.store');

//Displaying documents //
Route::get('/Documents',[FileController::class, 'getAll'])->name('documents');

//Display a single Document
Route::get('/Documents/{docId}',[FileController::class, 'getOne'])
->name('singleDoc');
;

//Showing the //
Route::get('/show', function () {
    return view('show');
});
// Route::get('/data', function () {
//     return view('data');
// });


//For GETTING homepage//
Route::get('Home', [FileController::class, 'index'])->name('file');


//Submit Button action from the Submit docs page//


// Route::get('/Submit',function(){
//     return view('pages.Submit');
// })->name('submit');

Route::view('search', 'show');
Route::get('find', [FileController::class, 'search']);
Route::view('data', 'data');
