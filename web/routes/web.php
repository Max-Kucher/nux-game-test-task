<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/a-page/{uuid}', function () {
    return view('pages.a-page.index');
})->name('a-page');
