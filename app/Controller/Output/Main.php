<?php

namespace Controller\Output;

use Src\View;

class Main
{
    public function main(): string
    {
        return (new View())->render('site.main');
    }
}

