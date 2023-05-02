<main>
    <div class="main-flex-page-group">
        <div class="card-page-group">
            <div class="discipline-title">
                <?php foreach ($groups as $group) { ?>
                    <p class="disc-t">
                        <?= $group->group_name ?>
                    </p>
                <?php } ?>
                <div class="disc-tt">
                    <a href="<?= app()->route->getUrl('/confirmation') . '?group_id=' . $group->group_id ?>" class="disc-ttt">Delete</a>
                    <a href="<?= app()->route->getUrl('/pageGroupEdit') . '?group_id=' . $group->group_id ?>" class="disc-ttt">Edit</a>
                </div>
            </div>
            <div class="group-info">
                <div class="right-column-group">
                    <div>
                        <p>Speciality:</p>
                        <p>Course:</p>
                        <p>Form:</p>
                    </div>
                </div>
                <div class="left-column-group">
                    <?php foreach ($groups as $group) { ?>
                        <div>
                            <p><?= $group->specialityGroup->speciality_name ?></p>
                            <p><?= $group->courseGroup->course ?></p>
                            <p><?= $group->educationGroup->edcform_name ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="group-wrapper-group">
                <?php foreach ($groups as $group) { ?>
                    <?php foreach ($group->groupDisc as $discipline) { ?>
                        <div class="group-title-group">
                            <a href="<?= app()->route->getUrl('/pageDiscipline') . '?discipline_id=' . $discipline->discipline_id ?>">
                                <?= $discipline->discipline_name ?>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="card-footer">
                <?php foreach ($groups as $group) { ?>
                    <p>
                        <a href="<?= app()->route->getUrl('/student') . '?group_id=' . $group->group_id ?>">Students</a>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
</main>