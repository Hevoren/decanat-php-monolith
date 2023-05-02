<main>
    <div class="main-flex-page-add-group">
        <div class="card-page-add-group">
            <div class="add-group-form">
                <div class="form-block">
                    <p class="form-block-title">Add group</p>
                    <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                    <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
                    <form action="" method="post">
                        <div class="input-wrapper">
                            <input required class="input-type" type="text" placeholder="Group name" name="group_name">
                            <select required class="input-type" name="speciality_id">
                                <?php foreach ($specialities as $speciality) { ?>
                                    <option required class="option-input"
                                            value="<?= $speciality->speciality_id ?>"><?= $speciality->speciality_name ?></option>
                                <?php } ?>
                            </select>
                            <select required class="input-type" name="course_id">
                                <?php foreach ($courses as $course) { ?>
                                    <option required class="option-input"
                                            value="<?= $course->course_id ?>"><?= $course->course ?></option>
                                <?php } ?>
                            </select>
                            <select required class="input-type" name="edcform_id">
                                <?php foreach ($edcforms as $edcform) { ?>
                                    <option class="option-input"
                                            value="<?= $edcform->edcform_id ?>"><?= $edcform->edcform_name ?></option>
                                <?php } ?>
                            </select>
                            <select required class="input-type" name="discipline_id">
                                <?php foreach ($disciplines as $discipline) { ?>
                                    <option class="option-input"
                                            value="<?= $discipline->discipline_id ?>"><?= $discipline->discipline_name ?></option>
                                <?php } ?>
                            </select>
                            <input class="input-submit" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>