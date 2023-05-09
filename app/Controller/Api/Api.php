<?php

namespace Controller\Api;

use Src\Request;
use Src\View;

class Api
{
    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }
}
