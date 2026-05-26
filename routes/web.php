<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return 'cache cleared';
});