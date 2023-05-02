<?php

use Src\Route;

//Получение главной страницы
Route::add('GET', '/main', [Controller\Site::class, 'main']);
Route::add('GET', '/', [Controller\Site::class, 'main']);

//Регистрация автроизация выход из сессии
Route::add(['GET', 'POST'], '/login', [Controller\AuthControl::class, 'login']);
Route::add(['GET', 'POST'], '/register', [Controller\AuthControl::class, 'signup']);
Route::add('GET', '/logout', [Controller\AuthControl::class, 'logout']);


//Получение всех дисциплин на главной экране после авторизации
Route::add('GET', '/discipline', [Controller\Site::class, 'disciplines'])
    ->middleware('auth');

//Получение всех групп
Route::add('GET', '/group', [Controller\Site::class, 'groups'])
    ->middleware('auth');

//Получение списка студентов для выбранной группы
Route::add('GET', '/student', [Controller\Site::class, 'students'])
    ->middleware('auth');

//Получение детальной информации о выбранной дисциплине из списка дисциплин
Route::add('GET', '/pageDiscipline', [Controller\Site::class, 'pageDiscipline'])
    ->middleware('auth');

//Получение детальной информации о выбранной группе из списка групп
Route::add('GET', '/pageGroup', [Controller\Site::class, 'pageGroup'])
    ->middleware('auth');

//Получение детальной информации о выбранном студенту из списка студентов выбранной группы
Route::add('GET', '/pageStudent', [Controller\Site::class, 'pageStudent'])
    ->middleware('auth');

//Личный кабинет админа в котором он может принимать на работу или увольнять сотрудников деканата
Route::add('GET', '/cab', [Controller\Site::class, 'cab'])
    ->middleware('auth');
Route::add( 'POST', '/cab', [Controller\Site::class, 'controlUser'])
    ->middleware('auth');

//Форма добавления дисициплины
Route::add('GET', '/addDiscipline', [Controller\Interactive::class, 'addDisciplineGet'])
    ->middleware('auth');
Route::add('POST', '/addDiscipline', [Controller\Interactive::class, 'addDiscipline'])
    ->middleware('auth');

//Форма добавления группы
Route::add('GET', '/addGroup', [Controller\Interactive::class, 'addGroupGet'])
    ->middleware('auth');
Route::add('POST', '/addGroup', [Controller\Interactive::class, 'addGroup'])
    ->middleware('auth');

//Форма добавления студента для выбранной группы
Route::add('GET', '/addStudent', [Controller\Interactive::class, 'addStudentGet'])
    ->middleware('auth');
Route::add('POST', '/addStudent', [Controller\Interactive::class, 'addStudent'])
    ->middleware('auth');

//Форма добавления оценки в зачетку для выбранного студента выбранной группы
Route::add('GET', '/addGrade', [Controller\Interactive::class, 'addGradeGet'])
    ->middleware('auth');
Route::add('POST', '/addGrade', [Controller\Interactive::class, 'addGrade'])
    ->middleware('auth');


//Подтверждение удаления
Route::add('GET', '/confirmation', [Controller\Interactive::class, 'confirmation'])
    ->middleware('auth');
Route::add('POST', '/confirmation', [Controller\Interactive::class, 'confirmation'])
    ->middleware('auth');

//Редактирование группы
Route::add('GET', '/pageGroupEdit', [Controller\Interactive::class, 'editPageStudentGet'])
    ->middleware('auth');
Route::add('POST', '/pageGroupEdit', [Controller\Interactive::class, 'editPageStudent'])
    ->middleware('auth');