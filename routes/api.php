<?php

use App\Http\Controllers\CitiesByStateController;
use Illuminate\Support\Facades\Route;

Route::prefix('/state')->group(function(){
    Route::get('/{uf}',CitiesByStateController::class);
});
