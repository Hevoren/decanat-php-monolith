<?php

namespace Controller\Api;

use Model\Disciplines;
use Src\View;

class ApiDisciplines
{
    public function disciplineApi(): void
    {
        if (app()->auth::user()->token) {
            $students = Disciplines::all()->toArray();
            (new View())->toJSON($students);
        } else {
            (new View())->toJSON(array('Access is denied'));
        }
    }
}