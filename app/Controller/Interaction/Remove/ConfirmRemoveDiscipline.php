<?php

namespace Controller\Interaction\Remove;

use Model\Disciplines;
use Model\GradeCards;
use Model\GroupDiscipline;
use Src\Request;
use Src\View;

class ConfirmRemoveDiscipline
{
    public function confirmationDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $gradeCard = GradeCards::where('discipline_id', $request->discipline_id);
            $groupDisc = GroupDiscipline::where('discipline_id', $request->discipline_id)->first();
            $discipline = Disciplines::where('discipline_id', $request->discipline_id)->first();
            if ((isset($groupDisc) === true) && (isset($gradeCard) === true)) {
                $gradeCard->delete();
                $groupDisc->delete();
                $discipline->delete();
                app()->route->redirect('/discipline');
            } elseif (isset($groupDisc) === false) {
                if (isset($gradeCard) === true) {
                    $gradeCard->delete();
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                } elseif (isset($gradeCard) === false) {
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                }
            } elseif (isset($groupDisc) === true) {
                if (isset($gradeCard) === true) {
                    $gradeCard->delete();
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                } elseif (isset($gradeCard) === false) {
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                }
            }
        }
        return new View('site.confirmationDelDiscipline');
    }
}