<main>
    <div class="main-flex-students">
        <div class="stud-list">
            <div class="students-title">
                <?php
                foreach ($groups as $group){
                    echo '<p class="stud-t">'. $group->group_name .'</p>';
                }
                ?>
            </div>
            <div class="stud-list-wrapper">
                <?php
                foreach ($students as $student) {
                    echo '<div><a href="#">' . $student->surname . '&nbsp' . mb_substr("$student->name", 0, 1). '.' . '&nbsp' . mb_substr("$student->mid_name", 0, 1) . '</a></div>';
                }
                ?>
            </div>
        </div>
    </div>
</main>