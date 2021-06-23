<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use CliStack\Modules\Crypto\Crypto;
use CliStack\Modules\Exec;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/hash', function (Request $request) {

    $userName = $request->input('userName');
    $password = $request->input('password');

    $hashedPassword = new Crypto();
    $hashedPassword = $hashedPassword->createHash($password, "md5");


    return response()->json([
        'username' => $userName,
        'password' => $hashedPassword
    ]);
});
