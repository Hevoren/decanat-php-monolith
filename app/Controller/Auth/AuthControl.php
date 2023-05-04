<?php

namespace Controller\Auth;

use Model\TempUsers;
use Model\Users;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

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

        $validator = new Validator($request->all(), [
            'name' => ['required'],
            'login' => ['required', 'unique:temp_users,login'],
            'password' => ['required']
        ], [
            'required' => 'Field :field empty',
            'unique' => 'Field :field must be unique'
        ]);

        if ($validator->fails()) {
            return new View('site.register',
                ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
        }

        if ($request->method === 'POST' && TempUsers::create($request->all())) {
            $messageE = 'In a little while our administrator will approve your registration.';
            return new View('site.register', ['messageE' => $messageE]);
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