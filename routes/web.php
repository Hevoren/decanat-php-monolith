<?php

use Src\Route;

Route::add('GET', '/main', [Controller\Site::class, 'main']);
Route::add('GET', '/discipline', [Controller\Site::class, 'disciplines'])
    ->middleware('auth');
Route::add('GET', '/group', [Controller\Site::class, 'groups'])
    ->middleware('auth');
Route::add('GET', '/student', [Controller\Site::class, 'students'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
