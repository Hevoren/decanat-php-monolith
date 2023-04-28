<?php

namespace Controller;

use Model\Disciplines;
use Model\Groups;
use Model\StudentGroups;
use Model\Students;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;

class Site
{
    public function main(): string
    {
        return (new View())->render('site.main');
    }

    public function disciplines(Request $request): string
    {
        
        $disciplines = Disciplines::all();
        return new View('site.discipline', ['disciplines' => $disciplines]);
    }

    public function groups(): string
    {
        $groups = Groups::all();
        return new View('site.group', ['groups' => $groups]);
    }

    public function students(Request $request): string
    {
        $groups = Groups::where('group_id', $request->group_id)->get();
        $students = Students::where('group_id', $request->group_id)->get();
        return (new View())->render('site.student', ['students' => $students, 'groups' => $groups]);
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/discipline');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/discipline');
    }

}
