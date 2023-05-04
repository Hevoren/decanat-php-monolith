<?php

namespace Controller\Interaction\Edit;

use Model\Controls;
use Model\Disciplines;
use Model\Semestrs;
use Src\Request;
use Src\View;

class EditPageDiscipline
{

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