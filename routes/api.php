<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JurusanController;

Route::get('/jurusan/{slug}', [JurusanController::class, 'show']);