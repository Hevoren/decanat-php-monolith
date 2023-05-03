<?php

namespace Controller\Interaction\Create;

use Model\Students;
use Src\Request;
use Src\View;

class AddStudent
{

    public function addStudentGet(): string
    {
        return new View('site.addStudent');
    }

    public function addStudent(Request $request): string
    {
        if ($request->method === 'POST') {
            $students = Students::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'mid_name' => $request->mid_name,
                'birth_date' => $request->birth_date,
                'adress' => $request->adress,
                'group_id' => $request->group_id
            ]);
            app()->route->redirect('/student?group_id=' . $request->group_id);
        }
        return new View('site.student');
    }

}