<main>
    <div class="main-flex-page-group">
        <div class="card-page-group">
            <div class="discipline-title">
                <?php foreach ($groups as $group) { ?>
                    <p class="disc-t">
                        <?= $group->group_name ?>
                    </p>
                <?php } ?>
            </div>
            <div class="group-info">
                <div class="right-column">
                    <div>
                        <p>Speciality:</p>
                        <p>Course:</p>
                        <p>Form:</p>
                    </div>
                </div>
                <div class="left-column">
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
                    <?php foreach ($group->groupDisc as $discipline) { ?>
                        <p><a href="<?= app()->route->getUrl('/student') . '?group_id=' . $discipline->pivot->group_id ?>">Students</a></p>
                    <?php } ?>
                <?php } ?>

            </div>
        </div>
    </div>
</main>