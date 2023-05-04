<?php

namespace Controller\Interaction\Search;

use Couchbase\Group;
use Model\Disciplines;
use Model\Groups;
use Model\Students;
use Src\Request;
use Src\View;

class Search
{
    public function searchRequestGet(Request $request): string
    {
        $lastPathComponent = basename($request->currentPage);
        $page = pathinfo($lastPathComponent, PATHINFO_FILENAME);
        $search = $request->searchRequest;
        if ($page === 'discipline') {
            $disciplines = Disciplines::where('discipline_name', 'like', '%' . $search . '%')->get();
            return new View('site.searchResults', ['disciplines' => $disciplines]);
        } elseif ($page === 'group') {
            $groups = Groups::orWhere('group_name', 'like', '%' . $search . '%')->get();
            return new View('site.searchResults', ['groups' => $groups]);
        } elseif ($page === 'student') {
            $students = Students::orWhere('name', 'like', '%' . $search . '%')->orWhere('surname', 'like', '%' . $search . '%')->orWhere('mid_name', 'like', '%' . $search . '%')->get();
            return new View('site.searchResults', ['students' => $students]);
        }
    }
}