<?php

namespace Controller\Api;

use Model\Students;
use Src\View;

class ApiStudents
{
    public function studentsApi(): void
    {
        if (app()->auth::user()->token) {
            $students = Students::all()->toArray();
            (new View())->toJSON($students);
        } else {
            (new View())->toJSON(array('Access is denied'));
        }
    }

}