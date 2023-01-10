<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\MemoireController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\AuthentificationController;
use App\Http\Controllers\Api\Auth\EmailVerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



//--------Root user--------------------------
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return Auth::user();
});

// Route::middleware('auth:api','verified')->get('/users', function (Request $request) {
//     return User::all();
// });
Route::get('/users', function (Request $request) {
    return User::with('role')->get();
})->middleware('auth:api');
//------------end root user------------
//  ire::with('authors','departement')->get()

// Route::get('users', function(){
//     return User::all(); 
// });


Route::group(['namespace'=>'Api\Auth'], function(){
    Route::get('/index',[AuthentificationController::class, 'index']);
    Route::get('/getuser/{email}',[AuthentificationController::class, 'getuser']);
    Route::get('/checkrole/{id}',[AuthentificationController::class,'checkRole']);
    Route::post('/login',[AuthentificationController::class, 'login']);
    Route::get('/logout', [AuthentificationController::class, 'logout'])->middleware('auth:api');
    Route::post('/register',[RegisterController::class, 'register']);
    Route::post('/upload_profile',[RegisterController::class, 'upload_profile']);
    Route::get('/addRole/{id}', [AuthorController::class, 'addRole'])->middleware('auth:api');
    Route::post('/send_mail', [RegisterController::class, 'sendSimpleMail'])->middleware('auth:api');
});


//Route Email verification

Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware('auth:api');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
Route::get('/email/verify', function () {
    return 'email not verify';
})->middleware('auth:api')->name('verification.notice');

//End Route Email verification


//Root for SchoolController
Route::group(['middleware'=>['auth:api', 'role:administrator|responsable']], function(){
    Route::get('/show', [SchoolController::class, 'index']);
});
//Route::get('/schools', [SchoolController::class, 'index']);

Route::group(['middleware'=>['auth:api', 'role:administrator|responsable']], function(){
   
    Route::get('/SchoolFilter/{id}', [SchoolController::class, 'showCase'])->middleware('auth:api');
    Route::post('/add_school', [SchoolController::class, 'store'])->middleware('auth:api');
    Route::get('/show_school/{id}', [SchoolController::class, 'show'])->middleware('auth:api');
    Route::put('/update_school/{id}', [SchoolController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete_school/{id}', [SchoolController::class, 'destroy'])->middleware('auth:api');
});
Route::get('/list_schools', [SchoolController::class, 'index']);

//End Root for SchoolController


//Root for DomaineController;

Route::group(['middleware'=>['auth:api', 'role:administrator|responsable']], function(){
    
    Route::post('/add_domaines', [DomaineController::class, 'store'])->middleware('auth:api');
    Route::get('/show_domaines/{id}', [DomaineController::class, 'show'])->middleware('auth:api');
    Route::put('/update_domaines/{id}', [DomaineController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete_domaines/{id}', [DomaineController::class, 'destroy'])->middleware('auth:api');
});
Route::get('/list_domaines', [DomaineController::class, 'index']);
//End Root for DomaineController


//Root for DepartementController

Route::group(['middleware'=>['auth:api','role:administrator|responsable']], function(){
  
    Route::get('/DepartFilter/{id}', [DepartementController::class, 'showCase'])->middleware('auth:api');
    Route::post('/add_departement', [DepartementController::class, 'store'])->middleware('auth:api');
    Route::get('/show_departements/{id}', [DepartementController::class, 'show'])->middleware('auth:api');
    Route::put('/update_departements/{id}', [DepartementController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete_departements/{id}', [DepartementController::class, 'destroy'])->middleware('auth:api');
});
Route::get('/list_departements', [DepartementController::class, 'index']);

//End Root for DepartementController

//Root for MemoireController

Route::group(['middleware'=>['auth:api','role:administrator|responsable']], function(){
    Route::get('/list_memoires', [MemoireController::class, 'index'])->middleware('auth:api');
    Route::get('/memoireFilter/{id}', [MemoireController::class, 'showCase'])->middleware('auth:api');
    Route::post('/add_memoire', [MemoireController::class, 'store'])->middleware('auth:api');
    //Route::get('/show_memoires/{id}', [MemoireController::class, 'show'])->middleware('auth:api');
    Route::put('/update_memoires/{id}', [MemoireController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete_memoires/{id}', [MemoireController::class, 'destroy'])->middleware('auth:api');
    Route::post('/add_AuthMemoire', [MemoireController::class, 'AddAuthMemoire'])->middleware('auth:api');
    Route::post('/upload_file',[MemoireController::class, 'upload_file'])->middleware('auth:api');
    Route::post('/dowload_file',[MemoireController::class, 'dowload_file'])->middleware('auth:api');
    
});
Route::post('/open_file',[MemoireController::class, 'open_file']);
Route::get('/show_memoires/{id}', [MemoireController::class, 'show']);
Route::get('/list_memoires', [MemoireController::class, 'index']);
Route::post('/show_byDate', [MemoireController::class, 'getdata_byDate']);

Route::post('/searchKey', [MemoireController::class, 'searchKey']);
Route::get('/searchDepart', [MemoireController::class, 'searchDepart']);

//End Root for MemoireController

//Root for AuthorController

Route::group(['middleware'=>['auth:api','role:administrator|responsable']], function(){
    
    Route::get('/authorFilter/{id}', [AuthorController::class, 'showCase'])->middleware('auth:api');
    Route::post('/add_author', [AuthorController::class, 'store'])->middleware('auth:api');
    Route::get('/show_authors/{id}', [AuthorController::class, 'show'])->middleware('auth:api');
    Route::put('/update_authors/{id}', [AuthorController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete_authors/{id}', [AuthorController::class, 'destroy'])->middleware('auth:api');
});
Route::get('/list_authors', [AuthorController::class, 'index']);


//End Root for AuthorController


// Root que l'on n'a aps besoin d'etre connecter

//Root for statistique
Route::group(['middleware'=>['auth:api','role:administrator|responsable']], function(){
    
    Route::get('/userChart', [ChartController::class, 'userChart'])->middleware('auth:api');
    Route::get('/memoireChart', [ChartController::class, 'memoireChart'])->middleware('auth:api');

});


