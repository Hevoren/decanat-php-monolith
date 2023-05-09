<?php

namespace Controller\Api;

use Model\Groups;
use Src\View;

class ApiGroups
{
    public function groupApi(): void
    {
        if (app()->auth::user()->token) {
            $students = Groups::all()->toArray();
            (new View())->toJSON($students);
        } else {
            (new View())->toJSON(array('Access is denied'));
        }
    }
}