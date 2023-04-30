<?php

use Src\Route;

Route::add('GET', '/main', [Controller\Site::class, 'main']);
Route::add('GET', '/', [Controller\Site::class, 'main']);
Route::add('GET', '/discipline', [Controller\Site::class, 'disciplines'])
    ->middleware('auth');
Route::add('GET', '/group', [Controller\Site::class, 'groups'])
    ->middleware('auth');
Route::add('GET', '/student', [Controller\Site::class, 'students'])
    ->middleware('auth');
Route::add('GET', '/pageDiscipline', [Controller\Site::class, 'pageDiscipline'])
    ->middleware('auth');
Route::add('GET', '/pageGroup', [Controller\Site::class, 'pageGroup'])
    ->middleware('auth');
Route::add('GET', '/pageStudent', [Controller\Site::class, 'pageStudent'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\AuthControl::class, 'login']);
Route::add(['GET', 'POST'], '/register', [Controller\AuthControl::class, 'signup']);
Route::add('GET', '/logout', [Controller\AuthControl::class, 'logout']);
