<?php

use App\Controllers\aboutController;
use App\Controllers\homeController;
use App\Controllers\indexController;
use Buildilume\Http\Route;



    Route::setRoute('/' , [indexController::class , 'index'])->name('home');

    Route::setRoute('/home' , [homeController::class , 'homePage'])->name('dashboard');

    Route::setRoute('/about' , [aboutController::class , 'aboutUs'])->name('about');
