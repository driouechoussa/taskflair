<?php

use App\Controllers\homeController;
use Taskflair\Http\Route;
    use Taskflair\Http\App;


    Route::setRoute('/' , [homeController::class , 'hero']);

