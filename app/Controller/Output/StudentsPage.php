<?php

namespace Controller\Output;

use Model\Groups;
use Model\Students;
use Src\Request;
use Src\View;

class StudentsPage
{
    public function students(Request $request): string
    {
        $groups = Groups::where('group_id', $request->group_id)->get();
        $students = Students::where('group_id', $request->group_id)->get();
        return (new View())->render('site.student', ['students' => $students, 'groups' => $groups]);
    }
}