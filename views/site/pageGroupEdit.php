<?php $groupId = $_GET['group_id'] ?? null; ?>
<main>
    <div class="main-flex-page-add-group">
        <div class="card-page-add-group">
            <div class="add-group-form">
                <div class="form-block">
                    <p class="form-block-title">Edit group</p>
                    <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                    <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
                    <form action="" method="post">
                        <div class="input-wrapper">
                            <input type="hidden" name="group_id" value="<?= $groupId ?>">
                            <label class="input-type">
                                <input required class="input-type-item-1" type="text" placeholder="Group name"
                                       name="group_name" value="<?= $groups['group_name'] ?>">
                            </label>

                            <label for="specialities" class="input-type">
                                <div class="input-type-label">Speciality:</div>
                                <select id="specialities" required class="input-type-item" name="speciality_id">
                                    <?php foreach ($specialities as $speciality) { ?>
                                        <option required class="option-input"
                                                value="<?= $speciality->speciality_id ?>" <?= ($groups['speciality_id'] === $speciality->speciality_id) ? 'selected' : '' ?>><?= $speciality->speciality_name ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label for="courses" class="input-type">
                                <div class="input-type-label">Course:</div>
                                <select id="courses" required class="input-type-item" name="course_id">
                                    <?php foreach ($courses as $course) { ?>
                                        <option required class="option-input"
                                                value="<?= $course->course_id ?>" <?= ($groups['course_id'] === $course->course_id) ? 'selected' : '' ?>><?= $course->course ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label for="edcforms" class="input-type">
                                <div class="input-type-label">Education:</div>
                                <select id="edcforms" required class="input-type-item" name="edcform_id">
                                    <?php foreach ($edcforms as $edcform) { ?>
                                        <option class="option-input"
                                                value="<?= $edcform->edcform_id ?>" <?= ($groups['edcform_id'] === $edcform->edcform_id) ? 'selected' : '' ?>><?= $edcform->edcform_name ?></option>
                                    <?php } ?>
                                </select>
                            </label>
                            <input class="input-submit" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>