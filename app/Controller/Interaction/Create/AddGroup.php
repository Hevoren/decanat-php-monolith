<?php

namespace Controller\Interaction\Create;

use Model\Courses;
use Model\Disciplines;
use Model\EducationForms;
use Model\GroupDiscipline;
use Model\Groups;
use Model\Specialities;
use Src\Request;
use Src\Validator\Validator;
use Src\View;


class AddGroup
{

    public function addGroupGet(Request $request): string
    {
        $specialities = Specialities::all();
        $courses = Courses::all();
        $edcforms = EducationForms::all();
        $disciplines = Disciplines::all();

        return new View('site.addGroup', ['specialities' => $specialities, 'courses' => $courses, 'edcforms' => $edcforms, 'disciplines' => $disciplines]);
    }

    public function addGroup(Request $request): string
    {

        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'group_name' => ['required', 'unique:groups,group_name', 'number'],
                'speciality_id' => ['required', 'number'],
                'course_id' => ['required', 'number'],
                'edcform_id' => ['required', 'number'],
                'discipline_id' => ['required', 'number']
            ], [
                'required' => 'Field :field is empty',
                'unique' => 'Group must be unique',
                'number' => 'Field :field incorrect'
            ]);

            if($validator->fails()){
                $messageD = json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
                return new View('site.addGroup', ['messageD' => $messageD]);
            }

            $groups = Groups::create([
                'group_name' => $request->group_name,
                'speciality_id' => $request->speciality_id,
                'course_id' => $request->course_id,
                'edcform_id' => $request->edcform_id,
            ]);

            $tempId = $groups->group_id;
            $groupDisc = GroupDiscipline::create([
                'group_id' => $tempId,
                'discipline_id' => $request->discipline_id
            ]);
            app()->route->redirect('/group');
        }
        return new View('site.group');
    }

}