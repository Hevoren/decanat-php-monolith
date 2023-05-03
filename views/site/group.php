<?php

use Src\Auth\Auth;

?>
<main>
    <div class="main-flex-groups">
        <div class="div-main-title-group">
            <p class="main-title">Groups</p>
        </div>

        <div class="wrapper">
            <?php foreach ($groups as $group) { ?>
                <a class="card"
                   href="<?= app()->route->getUrl('/pageGroup') . '?group_id=' . $group->group_id ?>"><?= $group->group_name ?>
                </a>
            <?php } ?>
            <?php if (app()->auth::userHasRole(2)): ?>
                <a class="group-add" href="<?= app()->route->getUrl('/addGroup') ?>">
                    +
                </a>
            <?php endif; ?>
        </div>
    </div>
</main>