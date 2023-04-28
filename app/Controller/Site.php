<?php

namespace Controller;

use Model\Disciplines;
use Model\Students;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;

class Site
{
    public function main(): string
    {
        $students = Students::all();
        return (new View())->render('site.main', ['students' => $students]);
    }

    public function disciplines(): string
    {
        $disciplines = Disciplines::all();
        return new View('site.discipline', ['disciplines' => $disciplines]);
    }

    public function signup(Request $request): string
    {
        if ($request->method==='POST' && User::create($request->all())){
            app()->route->redirect('/main');
        }
        return new View('site.signup');
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
