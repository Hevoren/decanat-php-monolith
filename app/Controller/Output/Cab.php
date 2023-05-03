<?php

namespace Controller\Output;

use Model\TempUsers;
use Model\Users;
use Src\View;

class Cab
{
    public function cab(): string
    {
        $activeUsers = Users::where('active', 1)->get();
        $users = TempUsers::where('active', 1)->get();
        return new View('site.cab', ['users' => $users, 'activeUsers' => $activeUsers]);
    }
}