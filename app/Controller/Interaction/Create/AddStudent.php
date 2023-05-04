<?php

namespace Controller\Interaction\Create;

use Model\Students;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class AddStudent
{

    public function addStudentGet(): string
    {
        return new View('site.addStudent');
    }

    public function addStudent(Request $request): string
    {
        $validator = new Validator($request->all(), [
            'name' => ['required', 'unique:students,name'],
            'surname' => ['required', 'unique:students,surname'],
            'mid_name' => ['required', 'unique:students,mid_name'],
            'birth_date' => ['required'],
            'adress' => ['required'],
            'group_id' => ['required'],
        ], [
            'required' => 'Field :field is empty',
            'unique' => 'Field :field must be unique'
        ]);

        if($validator->fails()){
            return new View('site.addStudent',
                ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
        }

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