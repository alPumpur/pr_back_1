<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])->middleware('admin');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add(['GET', 'POST'], '/', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/doctor', [Controller\Site::class, 'doctor']);
Route::add(['GET', 'POST'], '/patient', [Controller\Site::class, 'patient']);
Route::add(['GET', 'POST'], '/visit', [Controller\Site::class, 'visit']);
Route::add(['GET', 'POST'], '/specialization', [Controller\Site::class, 'spec']);
Route::add(['GET', 'POST'], '/position', [Controller\Site::class, 'post']);