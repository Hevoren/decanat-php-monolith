<?php

namespace Controller\Interaction\Edit;

use Model\Courses;
use Model\Disciplines;
use Model\EducationForms;
use Model\Groups;
use Model\Specialities;
use Src\Request;
use Src\View;

class EditPageGroup
{
    public function editPageGroupGet(Request $request): string
    {
        $specialities = Specialities::all();
        $courses = Courses::all();
        $edcforms = EducationForms::all();
        $disciplines = Disciplines::all();
        $groups = Groups::where('group_id', $request->group_id)->first();
        return new View('site.pageGroupEdit', ['groups' => $groups, 'specialities' => $specialities, 'courses' => $courses, 'edcforms' => $edcforms, 'disciplines' => $disciplines]);
    }

    public function editPageGroup(Request $request): string
    {
        $groupId = Groups::where('group_id', $request->group_id);
        if ($request->method === 'POST') {
            $groupId->update([
                'group_name' => $request->group_name,
                'course_id' => $request->course_id,
                'speciality_id' => $request->speciality_id,
                'edcform_id' => $request->edcform_id
            ]);
            app()->route->redirect('/pageGroup?group_id=' . $request->group_id);
        }
    }
}