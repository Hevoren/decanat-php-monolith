<?php

use Src\Auth\Auth;

?>
<main>
    <div class="main-flex-discipline">
        <div class="div-main-title-discipline">
            <p class="main-title">Search Results</p>
        </div>

        <div class="wrapper">
            <?php foreach ($disciplines as $discipline) { ?>
                <p><?= $discipline->discipline_name ?></p>
            <?php } ?>
            <?php foreach ($groups as $group) { ?>
                <p><?= $group->group_name ?></p>
            <?php } ?>
            <?php foreach ($students as $student) { ?>
                <p>
                    <?= $student->surname ?>
                    <?= "&nbsp" . mb_substr($student->name, 0, 1) . "." ?>
                    <?= "&nbsp" . mb_substr($student->mid_name, 0, 1) ?>
                </p>
            <?php } ?>
        </div>
    </div>
</main>