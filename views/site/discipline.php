<main>
    <div class="main-flex">
        <div class="div-main-title">
            <p class="main-title">Disciplines</p>
        </div>

        <div class="wrapper">
            <?php
            foreach ($disciplines as $discipline){
                echo '<a class="card">' . $discipline->discipline_name . '</a>';
            }
            ?>
        </div>
    </div>
</main>