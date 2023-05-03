<?php

namespace Controller\Interaction\Remove;

use Model\GradeCards;
use Model\GroupDiscipline;
use Model\Groups;
use Model\Students;
use Src\Request;
use Src\View;

class ConfirmRemoveGroup
{

    public function confirmationGroup(Request $request): string
    {
        if ($request->method === 'POST') {
            $student = Students::where('group_id', $request->group_id)->get();
            $studId = Students::where('group_id', $request->group_id)->first();
            $gradeCard = GradeCards::where('student_id', $studId->student_id)->first();
            $groupDisc = GroupDiscipline::where('group_id', $request->group_id)->first();
            $group = Groups::where('group_id', $request->group_id)->first();
            if ((isset($groupDisc) === true) && (isset($student) === true) && (isset($gradeCard) === true)) {
                foreach ($student as $stud) {
                    $grCard = GradeCards::where('student_id', $stud->student_id);
                    $grCard->delete();
                    app()->route->redirect('/group');
                }
                foreach ($student as $stud) {
                    $stud->delete();
                    app()->route->redirect('/group');
                }
                $groupDisc->delete();
                $group->delete();
                app()->route->redirect('/group');
            } elseif ((isset($groupDisc) === false) && (isset($gradeCard) === false) && (isset($student) === false)) {
                $group->delete();
                app()->route->redirect('/group');

            } elseif ((isset($groupDisc) === true) && (isset($gradeCard) === false) && (isset($student) === false)) {
                $groupDisc->delete();
                $group->delete();
                app()->route->redirect('/group');

            } elseif ((isset($groupDisc) === true) && (isset($gradeCard) === true) && (isset($student) === false)) {
                $groupDisc->delete();
                $group->delete();
                app()->route->redirect('/group');
            } elseif ((isset($groupDisc) === true) && (isset($gradeCard) === false) && (isset($student) === true)) {
                $groupDisc->delete();
                foreach ($student as $stud) {
                    $stud->delete();
                    app()->route->redirect('/group');
                }
                $group->delete();
                app()->route->redirect('/group');
            } elseif ((isset($groupDisc) === false) && (isset($gradeCard) === false) && (isset($student) === true)) {
                foreach ($student as $stud) {
                    $stud->delete();
                    app()->route->redirect('/group');
                }
                $group->delete();
                app()->route->redirect('/group');
            } elseif ((isset($groupDisc) === false) && (isset($gradeCard) === true) && (isset($student) === true)) {
                foreach ($student as $stud) {
                    $grCard = GradeCards::where('student_id', $stud->student_id);
                    $grCard->delete();
                    app()->route->redirect('/group');
                }
                foreach ($student as $stud) {
                    $stud->delete();
                    app()->route->redirect('/group');
                }
                $group->delete();
                app()->route->redirect('/group');
            } elseif ((isset($groupDisc) === false) && (isset($gradeCard) === true) && (isset($student) === false)) {
                $group->delete();
                app()->route->redirect('/group');
            }
        }
        return new View('site.confirmationDelGroup');
    }

}