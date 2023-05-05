<?php

namespace Controller\Output;

use Controller\Interaction\Create\UploadPhoto;
use Model\TempUsers;
use Model\Uploads;
use Model\Users;
use Src\Request;
use Src\View;

class ControlCab
{
    public function controlUser(Request $request): string
    {
        $userId = $request->get('id');
        $tempUser = TempUsers::find($userId);
        $user = Users::find($userId);
        if ($tempUser) {
            $userPassword = $tempUser->password;
            $user = new Users([
                'name' => $tempUser->name,
                'login' => $tempUser->login,
                'password' => $userPassword,
            ]);
            $user->save();
            $tempUser->active = 0;
            $tempUser->save();
        }
        else if ($user) {
            // Ищем TempUser с соответствующим login и меняем его active на 1
            $tempUser = TempUsers::where('login', $user->login)->first();
            if ($tempUser) {
                $tempUser->active = 1;
                $tempUser->save();
            }
            $upload = Uploads::where('id', $user->id)->get();
            foreach ($upload as $up) {
                $up->delete();
            }
            $user->delete();
        }
        $users = TempUsers::where('active', 1)->get();
        $activeUsers = Users::where('active', 1)->get();
        return new View('site.cab', ['users' => $users, 'activeUsers' => $activeUsers]);
    }
}