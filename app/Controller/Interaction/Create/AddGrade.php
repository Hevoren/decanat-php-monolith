<?php

namespace Controller\Interaction\Create;

use Model\Controls;
use Model\Disciplines;
use Model\GradeCards;
use Model\Grades;
use Src\Request;
use Src\View;

class AddGrade
{
    public function addGradeGet(): string
    {
        $disciplines = Disciplines::all();
        $controls = Controls::all();
        $grades = Grades::all();
        return new View('site.addGrade', ['controls' => $controls, 'grades' => $grades, 'disciplines' => $disciplines]);
    }

    public function addGrade(Request $request): string
    {
        if ($request->method === 'POST') {
            $gradeStudent = GradeCards::create([
                'student_id' => $request->student_id,
                'discipline_id' => $request->discipline_id,
                'control_id' => $request->control_id,
                'grade_id' => $request->grade_id
            ]);
            app()->route->redirect('/pageStudent?student_id=' . $request->student_id);
        }
        return new View('site.student');
    }
}