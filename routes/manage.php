<?php

use App\Controllers\aboutController;
use App\Controllers\homeController;
use Taskflair\Http\Route;



    Route::setRoute('/' , [homeController::class , 'index']);

    Route::setRoute('/about' , [aboutController::class , 'aboutUs']);

