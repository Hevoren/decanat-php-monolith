<?php

namespace Controller;

use Model\Disciplines;
use Model\PageDisciplines;
use Model\Groups;
use Model\PageGroups;
use Model\Students;
use Model\TempUsers;
use Model\Users;
use Src\View;
use Src\Request;

class Site
{
    public function main(): string
    {
        return (new View())->render('site.main');
    }

    public function disciplines(): string
    {
        $disciplines = Disciplines::all();
        return new View('site.discipline', ['disciplines' => $disciplines]);
    }

    public function groups(): string
    {
        $groups = Groups::all();
        return new View('site.group', ['groups' => $groups]);
    }

    public function students(Request $request): string
    {
        $groups = Groups::where('group_id', $request->group_id)->get();
        $students = Students::where('group_id', $request->group_id)->get();
        return (new View())->render('site.student', ['students' => $students, 'groups' => $groups]);
    }

    public function pageDiscipline(Request $request): string
    {
        $disciplines = PageDisciplines::where('discipline_id', $request->discipline_id)->get();
        return new View('site.pageDiscipline', ['disciplines' => $disciplines]);
    }

    public function pageGroup(Request $request): string
    {
        $groups = PageGroups::where('group_id', $request->group_id)->get();
        return new View('site.pageGroup', ['groups' => $groups]);
    }

    public function pageStudent(Request $request): string
    {
        $students = Students::where('student_id', $request->student_id)->get();
        return new View('site.pageStudent', ['students' => $students]);
    }

    public function cab(): string
    {
        $users = TempUsers::where('active', 1)->get();
        return new View('site.cab', ['users' => $users]);
    }

    public function addUser(Request $request): string
    {
        $userId = $request->get('id');
        $tempUser = TempUsers::find($userId);
        if ($tempUser) {
            $user = new Users([
                'name' => $tempUser->name,
                'login' => $tempUser->login,
                'password' => $tempUser->password,
            ]);
            $user->save();
            $tempUser->active = 0;
            $tempUser->save();
        }
        $users = TempUsers::where('active', 1)->get();
        return new View('site.cab', ['users' => $users]);
    }


}
