<?php

use Src\Route;

//Получение главной страницы
Route::add('GET', '/main', [Controller\Output\Main::class, 'main']);
Route::add('GET', '/', [Controller\Output\Main::class, 'main']);

//Регистрация автроизация выход из сессии
Route::add(['GET', 'POST'], '/login', [Controller\Auth\AuthControl::class, 'login']);
Route::add(['GET', 'POST'], '/register', [Controller\Auth\AuthControl::class, 'signup']);
Route::add('GET', '/logout', [Controller\Auth\AuthControl::class, 'logout']);


//Получение всех дисциплин на главной экране после авторизации
Route::add('GET', '/discipline', [Controller\Output\DisciplinesPage::class, 'disciplines'])
    ->middleware('auth');

//Получение всех групп
Route::add('GET', '/group', [Controller\Output\GroupsPage::class, 'groups'])
    ->middleware('auth');

//Получение списка студентов для выбранной группы
Route::add('GET', '/student', [Controller\Output\StudentsPage::class, 'students'])
    ->middleware('auth');

//Получение детальной информации о выбранной дисциплине из списка дисциплин
Route::add('GET', '/pageDiscipline', [Controller\Output\PageDisicpline::class, 'pageDiscipline'])
    ->middleware('auth');

//Получение детальной информации о выбранной группе из списка групп
Route::add('GET', '/pageGroup', [Controller\Output\PageGroup::class, 'pageGroup'])
    ->middleware('auth');

//Получение детальной информации о выбранном студенту из списка студентов выбранной группы
Route::add('GET', '/pageStudent', [Controller\Output\PageStudent::class, 'pageStudent'])
    ->middleware('auth');

//Личный кабинет админа в котором он может принимать на работу или увольнять сотрудников деканата
Route::add('GET', '/cab', [Controller\Output\Cab::class, 'cab'])
    ->middleware('auth', 'can:1');
Route::add( 'POST', '/cab', [Controller\Output\ControlCab::class, 'controlUser'])
    ->middleware('auth', 'can:1');

//Форма добавления дисициплины
Route::add('GET', '/addDiscipline', [Controller\Interaction\Create\AddDiscipline::class, 'addDisciplineGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/addDiscipline', [Controller\Interaction\Create\AddDiscipline::class, 'addDiscipline'])
    ->middleware('auth', 'can:2');

//Форма добавления группы
Route::add('GET', '/addGroup', [Controller\Interaction\Create\AddGroup::class, 'addGroupGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/addGroup', [Controller\Interaction\Create\AddGroup::class, 'addGroup'])
    ->middleware('auth', 'can:2');

//Форма добавления студента для выбранной группы
Route::add('GET', '/addStudent', [Controller\Interaction\Create\AddStudent::class, 'addStudentGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/addStudent', [Controller\Interaction\Create\AddStudent::class, 'addStudent'])
    ->middleware('auth', 'can:2');

//Форма добавления оценки в зачетку для выбранного студента выбранной группы
Route::add('GET', '/addGrade', [Controller\Interaction\Create\AddGrade::class, 'addGradeGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/addGrade', [Controller\Interaction\Create\AddGrade::class, 'addGrade'])
    ->middleware('auth', 'can:2');


//Подтверждение удаления группы
Route::add('GET', '/confirmationDelGroup', [Controller\Interaction\Remove\ConfirmRemoveGroup::class, 'confirmationGroup'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/confirmationDelGroup', [Controller\Interaction\Remove\ConfirmRemoveGroup::class, 'confirmationGroup'])
    ->middleware('auth', 'can:2');

//Редактирование группы
Route::add('GET', '/pageGroupEdit', [Controller\Interaction\Edit\EditPageGroup::class, 'editPageGroupGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/pageGroupEdit', [Controller\Interaction\Edit\EditPageGroup::class, 'editPageGroup'])
    ->middleware('auth', 'can:2');

//Подтверждение удаления дисциплины
Route::add('GET', '/confirmationDelDiscipline', [Controller\Interaction\Remove\ConfirmRemoveDiscipline::class, 'confirmationDiscipline'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/confirmationDelDiscipline', [Controller\Interaction\Remove\ConfirmRemoveDiscipline::class, 'confirmationDiscipline'])
    ->middleware('auth', 'can:2');

//Редактирование дисциплины
Route::add('GET', '/pageDisciplineEdit', [Controller\Interaction\Edit\EditPageDiscipline::class, 'editPageDisciplineGet'])
    ->middleware('auth', 'can:2');
Route::add('POST', '/pageDisciplineEdit', [Controller\Interaction\Edit\EditPageDiscipline::class, 'editPageDiscipline'])
    ->middleware('auth', 'can:2');

//Поиск
Route::add('GET', '/searchResults', [Controller\Interaction\Search\Search::class, 'searchRequestGet'])
    ->middleware('auth');

//Загрузка фото
Route::add('GET', '/uploadPhoto', [Controller\Interaction\Create\UploadPhoto::class, 'uploadPhotoGet'])
    ->middleware('auth');
Route::add('POST', '/uploadPhoto', [Controller\Interaction\Create\UploadPhoto::class, 'uploadPhoto'])
    ->middleware('auth');
