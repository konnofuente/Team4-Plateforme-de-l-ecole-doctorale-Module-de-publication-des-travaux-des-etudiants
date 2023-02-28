<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;




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

Route::get('/Document/search',[FileController::class,'search'])->name('Document.search');


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

Route::get('/login/student-code',function(){
    return view('pages.Login.studentCode');
})->name('login.student.code');

Route::get('find', [FileController::class, 'search']);

