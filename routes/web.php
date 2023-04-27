<?php

use Src\Route;

Route::add('GET', '/main', [Controller\Site::class, 'main']);
Route::add('GET', '/discipline', [Controller\Site::class, 'disciplines'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
