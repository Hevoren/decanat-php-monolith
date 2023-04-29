<main>
    <div class="main-flex-groups">
        <div class="div-main-title-group">
            <p class="main-title">Groups</p>
        </div>

        <div class="wrapper">
            <?php
            foreach ($groups as $group) {
                echo '<a href="' . app()->route->getUrl('/pageGroup') . '?group_id=' .  $group->group_id . '" class="card">' . $group->group_name . '</a>';
            }
            ?>
        </div>
    </div>
</main>