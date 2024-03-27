<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/doctor', [Controller\Site::class, 'doctor']);
Route::add(['GET', 'POST'], '/patient', [Controller\Site::class, 'patient']);
Route::add(['GET', 'POST'], '/visit', [Controller\Site::class, 'visit']);