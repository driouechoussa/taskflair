<?php

use App\Controllers\aboutController;
use App\Controllers\homeController;
use App\Controllers\indexController;
use App\Controllers\loginController;
use App\Controllers\signupController;
use Buildilume\Http\Route;



    Route::setRoute('/' , [indexController::class , 'index'])->name('home');

    Route::setRoute('/home' , [homeController::class , 'homePage'])->name('dashboard');

    Route::setRoute('/about' , [aboutController::class , 'aboutUs'])->name('about');

    Route::setRoute('/login' , [loginController::class , 'index'])->name('login');

    Route::setRoute('/signup' , [signupController::class , 'index'])->name('signup');
