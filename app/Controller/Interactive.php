<?php

namespace Controller;

use http\Client\Curl\User;
use Model\Controls;
use Model\Disciplines;
use Model\PageDisciplines;
use Model\Groups;
use Model\PageGroups;
use Model\Semestrs;
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
        if($request->method === 'POST') {
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
}