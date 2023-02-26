<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::controller(FileController::class)->prefix('/Document')->group(function(){

    Route::get('/','index');
})

?>
