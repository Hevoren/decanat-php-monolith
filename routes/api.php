<?php

use Src\Route;
//Вход/выход
Route::add('POST', '/login', [\Controller\Api\ApiLogin::class, 'loginApi']);
Route::add('POST', '/logout', [\Controller\Api\ApiLogout::class, 'logoutApi']);

//Вывод данных
Route::add('GET', '/gradecard', [\Controller\Api\ApiGradeCard::class, 'gradeCardApi']);
Route::add('GET', '/groups', [\Controller\Api\ApiGroups::class, 'groupApi']);
Route::add('GET', '/disciplines', [\Controller\Api\ApiDisciplines::class, 'disciplineApi']);
Route::add('GET', '/students', [\Controller\Api\ApiStudents::class, 'studentsApi']);
Route::add('POST', '/echo', [\Controller\Api\Api::class, 'echo']);
