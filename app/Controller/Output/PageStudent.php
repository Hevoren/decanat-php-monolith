<?php

namespace Controller\Output;

use Model\Students;
use Src\Request;
use Src\View;

class PageStudent
{
    public function pageStudent(Request $request): string
    {
        $students = Students::where('student_id', $request->student_id)->get();
        return new View('site.pageStudent', ['students' => $students]);
    }
}