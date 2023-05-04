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
            $gradeCard = GradeCards::where('discipline_id', $request->discipline_id)->get();
            $groupDisc = GroupDiscipline::where('discipline_id', $request->discipline_id)->get();
            $discipline = Disciplines::where('discipline_id', $request->discipline_id)->first();
            if ((isset($groupDisc) === true) && (isset($gradeCard) === true)) {
                foreach ($gradeCard as $i) {
                    $grCard = GradeCards::where('discipline_id', $i->discipline_id);
                    $grCard->delete();
                }
                foreach ($groupDisc as $i) {
                    $grDisc = GroupDiscipline::where('discipline_id', $i->discipline_id);
                    $grDisc->delete();
                }
                $discipline->delete();
                app()->route->redirect('/discipline');
            }
            if (isset($groupDisc) === false) {
                if (isset($gradeCard) === true) {
                    foreach ($gradeCard as $i) {
                        $grCard = GradeCards::where('discipline_id', $i->discipline_id);
                        $grCard->delete();
                    }
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                } elseif (isset($gradeCard) === false) {
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                }
            } elseif (isset($groupDisc) === true) {
                if (isset($gradeCard) === false) {
                    foreach ($groupDisc as $i) {
                        $grDisc = GroupDiscipline::where('discipline_id', $i->discipline_id);
                        $grDisc->delete();
                    }
                    $discipline->delete();
                    app()->route->redirect('/discipline');
                }
            }
        }
        return new View('site.confirmationDelDiscipline');
    }
}