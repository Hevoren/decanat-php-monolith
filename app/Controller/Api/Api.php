<?php

namespace Controller\Api;

use Model\Students;
use Src\Request;
use Src\View;

class Api
{
    public function index(): void
    {
        $students = Students::all()->toArray();

        (new View())->toJSON($students);
    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }
}
