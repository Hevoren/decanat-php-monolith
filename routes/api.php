<?php

use Src\Route;

Route::add('GET', '/', [\Controller\Api\Api::class, 'index']);
Route::add('POST', '/echo', [\Controller\Api\Api::class, 'echo']);
