<?php

namespace Controller\Output;

use Model\Disciplines;
use Src\View;

class DisciplinesPage
{

    public function disciplines(): string
    {
        $disciplines = Disciplines::all();
        return new View('site.discipline', ['disciplines' => $disciplines]);
    }

}