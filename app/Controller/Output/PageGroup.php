<?php

namespace Controller\Output;

use Model\PageGroups;
use Src\Request;
use Src\View;

class PageGroup
{
    public function pageGroup(Request $request): string
    {
        $groups = PageGroups::where('group_id', $request->group_id)->get();
        return new View('site.pageGroup', ['groups' => $groups]);
    }
}