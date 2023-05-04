<?php

namespace Controller\Interaction\Create;

use Model\Controls;
use Model\Disciplines;
use Model\GradeCards;
use Model\Grades;
use Src\Request;
use Src\Validator\Validator;
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
        $validator = new Validator($request->all(), [
            'student_id' => ['required'],
            'discipline_id' => ['required'],
            'control_id' => ['required'],
            'grade_id' => ['required'],
        ], [
            'required' => 'Field :field is empty',
            'unique' => 'Field :field must be unique'
        ]);

        if($validator->fails()){
            return new View('site.addStudent',
                ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
        }

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