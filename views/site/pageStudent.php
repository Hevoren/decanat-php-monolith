<main>
    <div class="main-flex">
        <div class="student">
            <div class="student-name">
                <?php foreach ($students as $student) { ?>
                    <p class="student-name-item">
                        <?= $student->surname ?>
                        <?= "&nbsp".mb_substr($student->name, 0, 1)."."?>
                        <?= "&nbsp".mb_substr($student->mid_name, 0, 1)?>
                    </p>
                <?php } ?>
            </div>
            <div class="student-info">
                <div class="left-column-students">
                    <div>
                        <p>Surname:</p>
                        <p>Name:</p>
                        <p>Mid name:</p>
                    </div>
                </div>
                <div class="right-column-students">
                    <?php foreach ($students as $student) { ?>
                    <div>
                        <p>
                            <?= $student->surname ?>
                        </p>
                        <p>
                            <?= $student->name ?>
                        </p>
                        <p>
                            <?= $student->mid_name ?>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="student-info-more">
                <div class="left-column-students">
                    <div>
                        <p>Birth date:</p>
                        <p>Adress:</p>
                        <p>Education form:</p>
                        <p>Speciality:</p>
                    </div>
                </div>
                <div class="right-column-students">
                    <?php foreach ($students as $student) { ?>
                    <div>
                        <p>
                            <?= $student->birth_date ?>
                        </p>
                        <p>
                            <?= $student->adress ?>
                        </p>
                        <p>
                        </p>
                        <p></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="student-footer">
                <div class="left-column-students">
                    <div>
                        <p>Group:</p>
                    </div>
                </div>
                <div class="right-column-students">
                    <?php foreach ($students as $student) { ?>
                    <div>
                        <p><?= $student->studentGroups->group_name ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="grade-card">
            <div class="grade-card-title">
                <p class="grade-card-title-item">Grade Card</p>
            </div>
            <div class="grade-card-flex">
                <div class="flex-disc">
                    <div>
                        <p>JavaScript</p>
                        <p>JavaScript</p>
                        <p>JavaScript</p>
                    </div>
                </div>
                <div class="flex-hour">
                    <div>
                        <p>120</p>
                        <p>120</p>
                        <p>120</p>
                    </div>
                </div>
                <div class="flex-control">
                    <div>
                        <p>exam</p>
                        <p>exam</p>
                        <p>exam</p>
                    </div>
                </div>
                <div class="flex-grade">
                    <div>
                        <p>5</p>
                        <p>5</p>
                        <p>5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>