<main>
    <div class="main-flex-page-discipline">
        <div class="card-page-discipline">
            <div class="discipline-title">
                <?php foreach ($disciplines as $discipline) { ?>
                    <p class="disc-t">
                        <?= $discipline->discipline_name ?>
                    </p>
                <?php } ?>
                <div class="disc-tt">
                    <a class="disc-ttt">Delete</a>
                    <a class="disc-ttt">Edit</a>
                </div>
            </div>
            <div class="discipline-info">
                <div class="right-column">
                    <div>
                        <p>Semestr:</p>
                        <p>Control:</p>
                        <p>Hours:</p>
                    </div>
                </div>
                <div class="left-column">
                    <?php foreach ($disciplines as $discipline) { ?>
                    <div>
                        <p>
                            <?= $discipline->semestrDisciplines->semestr ?>
                        </p>
                        <p>
                            <?= $discipline->controlDisciplines->control_name ?>
                        </p>
                        <p>
                            <?= $discipline->hours ?>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="group-wrapper">
                <?php foreach ($disciplines as $discipline) { ?>
                    <?php foreach ($discipline->groupDisc as $group) { ?>
                        <div class="group-title">
                            <a href="<?= app()->route->getUrl('/pageGroup') . '?group_id=' . $group->group_id ?>">
                                <?= $group->group_name ?>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="card-footer-groups">
                <p><a href="<?= app()->route->getUrl('/group') ?>">Groups</a></p>
            </div>
        </div>
    </div>
</main>