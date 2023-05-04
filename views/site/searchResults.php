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
                <p><?= $student->name ?></p>
            <?php } ?>
        </div>
    </div>
</main>