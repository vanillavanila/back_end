<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return 'cache cleared';
});

Route::get('/test-login', function () {

    $credentials = [
        'email' => 'adminsmk@gmail.com',
        'password' => 'password',
    ];

    if (Auth::attempt($credentials)) {
        return 'LOGIN BERHASIL';
    }

    return 'LOGIN GAGAL';
});

// Route::get('/debug-login', function () {

//     $credentials = [
//         'email' => 'adminsmk@gmail.com',
//         'password' => 'password',
//     ];

//     if (Auth::attempt($credentials)) {

//         request()->session()->regenerate();

//         return response()->json([
//             'status' => 'SUCCESS',
//             'user' => Auth::user(),
//             'session_id' => session()->getId(),
//         ]);
//     }

//     return response()->json([
//         'status' => 'FAILED',
//     ]);
// });