<?php

use Src\Auth\Auth;

?>
<main>
    <div class="main-flex-discipline">
        <div class="div-main-title-discipline">
            <p class="main-title">Disciplines</p>
        </div>

        <div class="wrapper">
            <?php foreach ($disciplines as $discipline) { ?>
                <a class="card"
                   href="<?= app()->route->getUrl('/pageDiscipline') . '?discipline_id=' . $discipline->discipline_id ?> ">
                    <?= $discipline->discipline_name ?>
                </a>
            <?php } ?>
            <?php if (app()->auth::userHasRole(2)): ?>
                <a class="card-add" href="<?= app()->route->getUrl('/addDiscipline') ?>">
                    +
                </a>
            <?php endif; ?>
        </div>
    </div>
</main>