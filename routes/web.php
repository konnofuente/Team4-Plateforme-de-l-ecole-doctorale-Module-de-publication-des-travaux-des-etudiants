<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('pages.Home');
});

Route::controller(FileController::class)->prefix('/Document')->group(function(){
    Route::get('/','getAll');
    Route::get('find','search');
    Route::get('doc/{docId}','getOne');
});

Route::controller(AuthController::class)->prefix('/Auth')->group(function(){
    Route::get('sign-up/visiteur','visiteur_signup_page')->name('signup.visiteur');
    Route::get('sign-up/admin','admin_signup')->name('signup.admin');
    Route::get('sign-up/etudiant','etudiant_no_code')->name('signup.etudiant');
    Route::get('sign-in/visiteur','visitor_login_page')->name('signin.visiteur');
    Route::get('sign-in/admin','admin_login_page')->name('signin.admin');
    Route::get('sign-in/etudiant-code','etudiant_code_login_page')->name('signin.etudiant-code');
    Route::get('sign-in/etudiant-no-code','etudiant_no_code_login_page');

    Route::post('sign-up/visiteur','visiteur_signup');
    Route::post('sign-in/visiteur','visiteur_login');

    Route::post('sign-in/admin','admin_login');
    Route::post('sign-up/admin','admin_signup');

    Route::post('sign-up/etudiant','etudiant_no_code_login');
    Route::post('sign-in/etudiant-code','etudiant_code_login');

})

?>
