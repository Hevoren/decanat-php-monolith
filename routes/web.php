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
    ->middleware('auth', 'can:1');
Route::add( 'POST', '/cab', [Controller\Site::class, 'controlUser'])
    ->middleware('auth', 'can:1');

//Форма добавления дисициплины
Route::add('GET', '/addDiscipline', [Controller\Interactive::class, 'addDisciplineGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/addDiscipline', [Controller\Interactive::class, 'addDiscipline'])
    ->middleware('auth', 'can:2');

//Форма добавления группы
Route::add('GET', '/addGroup', [Controller\Interactive::class, 'addGroupGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/addGroup', [Controller\Interactive::class, 'addGroup'])
    ->middleware('auth', 'can:2');

//Форма добавления студента для выбранной группы
Route::add('GET', '/addStudent', [Controller\Interactive::class, 'addStudentGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/addStudent', [Controller\Interactive::class, 'addStudent'])
    ->middleware('auth', 'can:2');

//Форма добавления оценки в зачетку для выбранного студента выбранной группы
Route::add('GET', '/addGrade', [Controller\Interactive::class, 'addGradeGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/addGrade', [Controller\Interactive::class, 'addGrade'])
    ->middleware('auth', 'can:2');


//Подтверждение удаления группы
Route::add('GET', '/confirmationDelGroup', [Controller\Interactive::class, 'confirmationGroup'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/confirmationDelGroup', [Controller\Interactive::class, 'confirmationGroup'])
    ->middleware('auth', 'can:2');

//Редактирование группы
Route::add('GET', '/pageGroupEdit', [Controller\Interactive::class, 'editPageGroupGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/pageGroupEdit', [Controller\Interactive::class, 'editPageGroup'])
    ->middleware('auth', 'can:2');

//Подтверждение удаления дисциплины
Route::add('GET', '/confirmationDelDiscipline', [Controller\Interactive::class, 'confirmationDiscipline'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/confirmationDelDiscipline', [Controller\Interactive::class, 'confirmationDiscipline'])
    ->middleware('auth', 'can:2');

//Редактирование дисциплины
Route::add('GET', '/pageDisciplineEdit', [Controller\Interactive::class, 'editPageDisciplineGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/pageDisciplineEdit', [Controller\Interactive::class, 'editPageDiscipline'])
    ->middleware('auth', 'can:2');