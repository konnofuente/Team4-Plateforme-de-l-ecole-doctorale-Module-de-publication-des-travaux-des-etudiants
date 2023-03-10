<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ThemeController;

Route::get('/', function () {
    return view('pages.Home');
})->name('homePage');

Route::controller(FileController::class)->prefix('/Document')->group(function(){
    Route::get('/','getAll');
    Route::get('find','search');
    Route::get('doc/{docId}','getOne');
});

Route::controller(AuthController::class)->prefix('/Auth')->group(function(){
    Route::get('sign-up/visiteur','visiteur_signup_page')->name('signup.visiteur');
    Route::get('sign-up/admin','admin_signup')->name('signup.admin');
    Route::get('sign-up/etudiant','etudiant_no_code')->name('signup.etudiant');
    Route::get('sign-in/visiteur','visitor_login_page')->name('login');
    Route::get('sign-in/admin','admin_login_page')->name('signin.admin');
    Route::get('sign-in/etudiant-code','etudiant_code_login_page')->name('signin.etudiant-code');
    Route::get('sign-in/etudiant-no-code','etudiant_no_code_login_page');

    Route::post('sign-up/visiteur','visiteur_signup');
    Route::post('sign-in/visiteur','visiteur_login');

    Route::post('sign-in/admin','admin_login');
    Route::post('sign-up/admin','admin_signup');

    Route::post('sign-up/etudiant','etudiant_no_code_login');
    Route::post('sign-in/etudiant-code','etudiant_code_login');
    Route::post('logout','logOut')->name('logOut');

});


Route::controller(ThemeController::class)->middleware('auth')->prefix('/Admin')->group(function(){
    Route::get('/','get_all_memoires')->name('admin.gerer_memoires');
    Route::get('/theme/{theme}','get_theme')->name('admin.single_theme');
    Route::get('/theme/{theme}/view/{doc}','viewDoc')->name('viewDoc');
    Route::post('/theme/{theme}/attestation/{id}/accept','accept_attestation')->name('admin.accept_attestation');
    Route::post('/theme/{theme}/attestation/{id}/denie','denie_attestation')->name('admin.denie_attestation');
    Route::post('/theme/{theme}/memoire/{id}/accept','accept_memoire')->name('admin.accept_memoire');
    Route::post('/theme/{theme}/memoire/{id}/denie','denie_memoire')->name('admin.denie_memoire');
    Route::get('/admin/Gerer');
    Route::get('/mon-compte');
})

// Route::get('/')
?>
