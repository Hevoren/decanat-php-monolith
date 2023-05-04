<?php

namespace Controller\Interaction\Create;

use Model\Controls;
use Model\Disciplines;
use Model\GroupDiscipline;
use Model\Groups;
use Model\Semestrs;
use Src\Request;
use Src\Validator\Validator;
use Src\View;


class AddDiscipline
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
            $validator = new Validator($request->all(), [
                'discipline_name' => ['required', 'unique:disciplines,discipline_name'],
                'semestr_id' => ['required'],
                'hours' => ['required'],
                'control_id' => ['required'],
                'group_id' => ['required']
            ], [
                'required' => 'Field :field is empty',
                'unique' => 'Field :field must be unique'
            ]);

            if($validator->fails()){
                return new View('site.addDiscipline',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

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
}