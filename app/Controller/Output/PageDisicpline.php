<?php

namespace Controller\Output;

use Model\PageDisciplines;
use Src\Request;
use Src\View;

class PageDisicpline
{
    public function pageDiscipline(Request $request): string
    {
        $disciplines = PageDisciplines::where('discipline_id', $request->discipline_id)->get();
        return new View('site.pageDiscipline', ['disciplines' => $disciplines]);
    }
}