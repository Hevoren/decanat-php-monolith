<?php

use Src\Auth\Auth;

?>
<main>
    <div class="main-flex-discipline">
        <div class="div-main-title-discipline">
            <p class="main-title">Search Results: <b style="color: #7abaca">"<?= $search ?>"</b></p>
        </div>

        <div class="wrapper">
            <?php if (isset($disciplines) === true) { ?>
                <?php foreach ($disciplines as $discipline) { ?>
                    <a class="card"
                       href="<?= app()->route->getUrl('/pageDiscipline') . '?discipline_id=' . $discipline->discipline_id ?> "><?= $discipline->discipline_name ?></a>
                <?php } ?>
            <?php } ?>

            <?php if (isset($groups) === true) { ?>
                <?php foreach ($groups as $group) { ?>
                    <a class="card" href="<?= app()->route->getUrl('/pageGroup') . '?group_id=' . $group->group_id ?>"><?= $group->group_name ?></a>
                <?php } ?>
            <?php } ?>

            <?php if (isset($students) === true) { ?>
                <?php foreach ($students as $student) { ?>
                    <a class="stud-list-wrapper-item" href="<?= app()->route->getUrl('/pageStudent') . '?student_id=' . $student->student_id ?>">
                        <?= $student->surname ?>
                        <?= "&nbsp" . mb_substr($student->name, 0, 1) . "." ?>
                        <?= "&nbsp" . mb_substr($student->mid_name, 0, 1) ?>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</main>