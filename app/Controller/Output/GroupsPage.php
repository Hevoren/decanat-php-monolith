<?php

namespace Controller\Output;

use Model\Groups;
use Src\View;

class GroupsPage
{
    public function groups(): string
    {
        $groups = Groups::all();
        return new View('site.group', ['groups' => $groups]);
    }
}