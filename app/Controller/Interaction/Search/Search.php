<?php

namespace Controller\Interaction\Search;

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
        $lastPathComponentStud = basename($request->currentPagee);
        $page = pathinfo($lastPathComponent, PATHINFO_FILENAME);
        $pagee = pathinfo($lastPathComponentStud, PATHINFO_FILENAME);
        $index = strpos($pagee, "=") + 1;
        $group_id = substr($pagee, $index);
        $search = $request->searchRequest;

        if ($page === 'discipline') {
            $disciplines = Disciplines::where('discipline_name', 'like', '%' . $search . '%')->get();
            return new View('site.searchResults', ['disciplines' => $disciplines, 'search' => $search]);
        } elseif ($page === 'group') {
            $groups = Groups::orWhere('group_name', 'like', '%' . $search . '%')->get();
            return new View('site.searchResults', ['groups' => $groups, 'search' => $search]);
        }
        if ($page === 'student') {
            $students = Students::where('group_id', intval($group_id))
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('surname', 'like', '%' . $search . '%')
                        ->orWhere('mid_name', 'like', '%' . $search . '%');
                })
                ->get();
            return new View('site.searchResults', ['students' => $students, 'search' => $search]);
        }
    }
}