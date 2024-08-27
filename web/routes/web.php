<?php

use App\Http\Controllers\PageAController;
use App\Http\Middleware\ValidateAPageLink;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/a-page/{uuid}', [PageAController::class, 'show'])
    ->name('a-page')
    ->middleware(ValidateAPageLink::class);
