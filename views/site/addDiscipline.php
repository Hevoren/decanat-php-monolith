<main>
    <div class="main-flex-page-add-discipline">
        <div class="card-page-add-discipline">
            <div class="add-discipline-form">
                <div class="form-block">
                    <p class="form-block-title">Add discipline</p>
                    <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                    <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
                    <?php if(isset($messageD)){ ?>
                        <?php $errorss = json_decode($messageD, true); ?>
                        <?php if(count($errorss) > 0){ ?>
                            <ul style="color: red; margin-top: 10px;">
                                <?php foreach($errorss as $field => $messagess){ ?>
                                    <?php foreach($messagess as $messagee){ ?>
                                        <li style="color: red; margin-top: 10px"><?= $messagee ?></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    <?php } ?>
                    <form action="" method="post">
                        <div class="input-wrapper">
                            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                            <label class="input-type">
                                <input required class="input-type-item-1" type="text" placeholder="Discipline"
                                       name="discipline_name">
                            </label>

                            <label class="input-type">
                                <div class="input-type-label">Semester:</div>
                                <select class="input-type-item" required name="semestr_id">
                                    <option selected value="">choice</option>
                                    <?php foreach ($semestrs as $semestr) { ?>
                                        <option class="option-input"
                                                value="<?= $semestr->semestr_id ?>"><?= $semestr->semestr ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label class="input-type">
                                <div class="input-type-label">Control:</div>
                                <select class="input-type-item" required class="input-type" name="control_id">
                                    <option selected value="">contol</option>
                                    <?php foreach ($controls as $control) { ?>
                                        <option class="option-input"
                                                value="<?= $control->control_id ?>"><?= $control->control_name ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label class="input-type">
                                <div class="input-type-label">Group:</div>
                                <select required class="input-type-item" name="group_id">
                                    <option selected value="">group</option>
                                    <?php foreach ($groups as $group) { ?>
                                        <option class="option-input"
                                                value="<?= $group->group_id ?>"><?= $group->group_name ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label class="input-type">
                                <input required class="input-type-item-1" type="number" placeholder="Hours"
                                       name="hours">
                            </label>

                            <input class="input-submit" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>