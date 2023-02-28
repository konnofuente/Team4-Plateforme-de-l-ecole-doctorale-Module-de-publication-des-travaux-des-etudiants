<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::controller(FileController::class)->prefix('/Document')->group(function(){
    Route::get('/','getAll');
    Route::get('find','search');
    Route::get('doc/{docId}','getOne');
})

?>
