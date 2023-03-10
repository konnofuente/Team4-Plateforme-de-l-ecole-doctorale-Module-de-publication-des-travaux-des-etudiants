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
Route::get('/', function () {
    return view('file');
});
Route::get('/show', function () {
    return view('show');
});
Route::get('/data', function () {
    return view('data');
});



Route::get('file', [FileController::class, 'index'])->name('file');
Route::post('file', [FileController::class, 'store'])->name('file.store');

Route::view('search', 'show');
Route::get('find', [FileController::class, 'search']);
Route::view('data', 'data');