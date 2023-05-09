<?php

namespace Controller\Api;

use Model\GradeCards;
use Src\View;

class ApiGradeCard
{
    public function gradeCardApi(): void
    {
        if (app()->auth::user()->token) {
            $gradeCards = GradeCards::with('disciplines:discipline_id,hours')->with('student')->with('controls')->with('grade')->get()->toArray();
            (new View())->toJSON($gradeCards);
        } else {
            (new View())->toJSON(array('Access is denied'));
        }
    }
}