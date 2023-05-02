<main>
    <div class="main-flex-page-add-discipline">
        <div class="card-page-add-discipline">
            <div class="add-discipline-form">
                <div class="form-block">
                    <p class="form-block-title">Add discipline</p>
                    <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                    <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
                    <form action="" method="post">
                        <div class="input-wrapper">
                            <input required class="input-type" type="text" placeholder="Discipline" name="discipline_name">
                            <select required class="input-type" name="semestr_id">
                                <?php foreach ($semestrs as $semestr) { ?>
                                    <option class="option-input"
                                            value="<?= $semestr->semestr_id ?>"><?= $semestr->semestr ?></option>
                                <?php } ?>
                            </select>
                            <select required class="input-type" name="control_id">
                                <?php foreach ($controls as $control) { ?>
                                    <option class="option-input"
                                            value="<?= $control->control_id ?>"><?= $control->control_name ?></option>
                                <?php } ?>
                            </select>
                            <select required class="input-type" name="group_id">
                                <?php foreach ($groups as $group) { ?>
                                    <option class="option-input"
                                            value="<?= $group->group_id ?>"><?= $group->group_name ?></option>
                                <?php } ?>
                            </select>
                            <input required class="input-type" type="number" placeholder="Hours" name="hours">
                            <input class="input-submit" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>