<?php

namespace Controller;

use Couchbase\Group;
use http\Client\Curl\User;
use Model\Controls;
use Model\Courses;
use Model\Disciplines;
use Model\EducationForms;
use Model\GradeCards;
use Model\Grades;
use Model\GroupDiscipline;
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
        $groups = Groups::all();

        return new View('site.addDiscipline', ['disciplines' => $disciplines, 'controls' => $controls, 'semestrs' => $semestrs, 'groups' => $groups]);
    }

    public function addDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $disciplines = Disciplines::create([
                'discipline_name' => $request->discipline_name,
                'semestr_id' => $request->semestr_id,
                'control_id' => $request->control_id,
                'hours' => $request->hours
            ]);
            $tempId = $disciplines->discipline_id;
            $groupDisc = GroupDiscipline::create([
                'group_id' => $request->group_id,
                'discipline_id' => $tempId
            ]);
            app()->route->redirect('/discipline');
        }
        return new View('site.discipline');
    }

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

    public function addGradeGet(): string
    {
        $disciplines = Disciplines::all();
        $controls = Controls::all();
        $grades = Grades::all();
        return new View('site.addGrade', ['controls' => $controls, 'grades' => $grades, 'disciplines' => $disciplines]);
    }

    public function addGrade(Request $request): string
    {
        if($request->method === 'POST') {
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

    public function confirmationGroup(Request $request):string
    {
        if ($request->method === 'POST') {
            $student = Students::where('group_id', $request->group_id);
            $groupDisc = GroupDiscipline::where('group_id', $request->group_id)->first();
            $group = Groups::where('group_id', $request->group_id)->first();
            if((isset($groupDisc) === true) && (isset($student) === true)){
                $student->delete();
                $groupDisc->delete();
                $group->delete();
                app()->route->redirect('/group');
            }elseif (isset($groupDisc) === false){
                if(isset($student) === true){
                    $student->delete();
                    $group->delete();
                    app()->route->redirect('/group');
                }elseif (isset($student) === false){
                    $group->delete();
                    app()->route->redirect('/group');
                }
            }elseif(isset($groupDisc) === true){
                if(isset($student) === true){
                    $student->delete();
                    $group->delete();
                    app()->route->redirect('/group');
                }elseif (isset($student) === false){
                    $group->delete();
                    app()->route->redirect('/group');
                }
            }
        }
        return new View('site.confirmationDelGroup');
    }

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

    public function confirmationDiscipline(Request $request): string
    {
        if ($request->method === 'POST'){
            $gradeCard = GradeCards::where('discipline_id', $request->discipline_id);
            $groupDisc = GroupDiscipline::where('discipline_id', $request->discipline_id)->first();
            $discipline = Disciplines::where('discipline_id', $request->discipline_id)->first();
            if((isset($groupDisc) === true) && (isset($gradeCard) === true)){
                $gradeCard->delete();
                $groupDisc->delete();
                $discipline->delete();
                app()->route->redirect('/discipline');
            }elseif (isset($groupDisc) === false){
                if(isset($gradeCard) === true){
                    $gradeCard->delete();
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                }elseif (isset($gradeCard) === false){
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                }
            }elseif(isset($groupDisc) === true){
                if(isset($gradeCard) === true){
                    $gradeCard->delete();
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                }elseif (isset($gradeCard) === false){
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                }
            }
        }
        return new View('site.confirmationDelDiscipline');
    }

    public function editPageDisciplineGet(Request $request): string
    {
        $semesters = Semestrs::all();
        $controls = Controls::all();
        $disciplines = Disciplines::where('discipline_id', $request->discipline_id)->first();
        return new View('site.pageDisciplineEdit', ['semesters' => $semesters, 'controls' => $controls, 'disciplines' => $disciplines]);
    }

    public function editPageDiscipline(Request $request): string
    {
        $disciplineId = Disciplines::where('discipline_id', $request->discipline_id);
        if ($request->method === 'POST') {
            $disciplineId->update([
                'discipline_name' => $request->discipline_name,
                'semestr_id' => $request->semestr_id,
                'control_id' => $request->control_id,
                'hours' => $request->hours
            ]);
            app()->route->redirect('/pageDiscipline?discipline_id=' . $request->discipline_id);
        }
    }
}