<?php

namespace Controller;

use http\Client\Curl\User;
use Model\Controls;
use Model\Courses;
use Model\Disciplines;
use Model\EducationForms;
use Model\PageDisciplines;
use Model\Groups;
use Model\PageGroups;
use Model\Semestrs;
use Model\Specialities;
use Model\Students;
use Model\TempUsers;
use Model\Users;
use Src\View;
use Src\Request;

class Interactive
{
    public function addDisciplineGet(Request $request): string
    {
        $semestrs = Semestrs::all();
        $controls = Controls::all();
        $disciplines = Disciplines::all();

        return new View('site.addDiscipline', ['disciplines' => $disciplines, 'controls' => $controls, 'semestrs' => $semestrs]);
    }

    public function addDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $disciplines = new Disciplines([
                'discipline_name' => $request->discipline_name,
                'semestr_id' => $request->semestr_id,
                'control_id' => $request->control_id,
                'hours' => $request->hours
            ]);
            $disciplines->save();
            app()->route->redirect('/discipline');
        }
        return new View('site.discipline');
    }

    public function addGroupGet(Request $request): string
    {
        $specialities = Specialities::all();
        $courses = Courses::all();
        $edcforms = EducationForms::all();


        return new View('site.addGroup', ['specialities' => $specialities, 'courses' => $courses, 'edcforms' => $edcforms]);
    }

    public function addGroup(Request $request): string
    {
        if ($request->method === 'POST') {
            $groups = new Groups([
                'group_name' => $request->group_name,
                'speciality_id' => $request->speciality_id,
                'course_id' => $request->course_id,
                'edcform_id' => $request->edcform_id,
            ]);
            $groups->save();
            app()->route->redirect('/group');
        }
        return new View('site.group');
    }

    public function addStudentGet(): string
    {
        return new View('site.addStudent');
    }

    public function addStudent(Request $request): string
    {
        if ($request->method === 'POST') {
            $students = new Students([
                'name' => $request->name,
                'surname' => $request->surname,
                'mid_name' => $request->mid_name,
                'birth_date' => $request->birth_date,
                'adress' => $request->adress,
                'group_id' => $request->group_id
            ]);
            $students->save();
            app()->route->redirect('/student?group_id=' . $request->group_id);
        }
        return new View('site.student');
    }
}