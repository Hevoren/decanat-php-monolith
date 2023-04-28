<main>
    <div class="main-flex-discipline">
        <div class="div-main-title-discipline">
            <p class="main-title">Disciplines</p>
        </div>

        <div class="wrapper">
            <?php
            foreach ($disciplines as $discipline){
                echo '<a href="' . app()->route->getUrl('/pageDiscipline') . '?discipline_id=' .  $discipline->discipline_id . '" class="card">' . $discipline->discipline_name . '</a>';
            }
            ?>
        </div>
    </div>
</main>