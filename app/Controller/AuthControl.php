<?php

namespace Controller;

use Model\TempUsers;
use Model\Users;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

class AuthControl
{

    public function signup(Request $request): string
    {
        $login = 'login';

        if(!empty($request->all())) {
            $user = Users::where('login', $request->get($login))->first();
            if ($user) {
                return new View('site.register', ['message' => 'Пользователь с таким логином уже есть']);
            }
        }
        if ($request->method === 'GET') {
            session_unset();
            return new View('site.register');
        }
        if ($request->method === 'POST' && TempUsers::create($request->all())) {
            app()->route->redirect('/discipline');
        }
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