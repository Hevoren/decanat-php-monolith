<?php $studentId = $_GET['student_id'] ?? null; ?>
<main>
    <div class="main-flex-page-add-group">
        <div class="card-page-add-group">
            <div class="add-group-form">
                <div class="form-block">
                    <p class="form-block-title">Add grade</p>
                    <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                    <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
                    <form action="" method="post">
                        <div class="input-wrapper">
                            <input type="hidden" name="student_id" value="<?= $studentId ?>">
                            <label class="input-type">
                                <div class="input-type-label">Discipline:</div>
                                <select required class="input-type-item" name="discipline_id">
                                    <option selected value="">choice</option>
                                    <?php foreach ($disciplines as $discipline) { ?>
                                        <option class="option-input"
                                                value="<?= $discipline->discipline_id ?>"><?= $discipline->discipline_name ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label class="input-type">
                                <div class="input-type-label">Control:</div>
                                <select required class="input-type-item" name="control_id">
                                    <option selected value="">choice</option>
                                    <?php foreach ($controls as $control) { ?>
                                        <option class="option-input"
                                                value="<?= $control->control_id ?>"><?= $control->control_name ?></option>
                                    <?php } ?>
                                </select>
                            </label>

                            <label class="input-type">
                                <div class="input-type-label">Grade:</div>
                                <select required class="input-type-item" name="grade_id">
                                    <option selected value="">choice</option>
                                    <?php foreach ($grades as $grade) { ?>
                                        <option class="option-input"
                                                value="<?= $grade->grade_id ?>"><?= $grade->grade ?></option>
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