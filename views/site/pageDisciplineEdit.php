<?php $disciplineId = $_GET['discipline_id'] ?? null; ?>
<main>
    <div class="main-flex-page-add-discipline">
        <div class="card-page-add-discipline">
            <div class="add-discipline-form">
                <div class="form-block">
                    <p class="form-block-title">Edit discipline</p>
                    <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                    <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
                    <form action="" method="post">
                        <div class="input-wrapper">
                            <input type="hidden" name="group_id" value="<?= $disciplineId ?>">
                            <label class="input-type">
                                <input required class="input-type-item-1" type="text" placeholder="Discipline"
                                       name="discipline_name" value="<?= $disciplines['discipline_name'] ?>">
                            </label>

                            <label class="input-type">
                                <div class="input-type-label">Semester:</div>
                                <select class="input-type-item" required name="semestr_id">
                                    <?php foreach ($semesters as $semester) { ?>
                                        <option class="option-input"
                                                value="<?= $semester->semestr_id ?>" <?= ($disciplines['semestr_id'] === $semester->semestr_id) ? 'selected' : '' ?>><?= $semester->semestr ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label class="input-type">
                                <div class="input-type-label">Control:</div>
                                <select class="input-type-item" required class="input-type" name="control_id">
                                    <?php foreach ($controls as $control) { ?>
                                        <option class="option-input"
                                                value="<?= $control->control_id ?>" <?= ($disciplines['control_id'] === $control->control_id) ? 'selected' : '' ?>><?= $control->control_name ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label class="input-type">
                                <input required class="input-type-item-1" type="number" placeholder="Hours" name="hours"
                                       value="<?= $disciplines['hours'] ?>">
                            </label>

                            <input class="input-submit" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>