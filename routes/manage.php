<?php

use App\Controllers\aboutController;
use App\Controllers\homeController;
use App\Controllers\indexController;
use Taskflair\Http\Route;



    Route::setRoute('/' , [indexController::class , 'index']);

    Route::setRoute('/home' , [homeController::class , 'homePage']);

    Route::setRoute('/about' , [aboutController::class , 'aboutUs']);