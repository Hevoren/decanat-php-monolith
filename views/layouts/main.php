<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="../php-framework/public/assests/login.css">-->
<!--    <link rel="stylesheet" href="/public/assets/login.css">-->

    <link rel="stylesheet" href="/public/assets/css/login.css">
    <link rel="stylesheet" href="/public/assets/css/main.css">
    <link rel="stylesheet" href="/public/assets/css/disciplines.css">
    <link rel="stylesheet" href="/public/assets/css/students.css">
    <link rel="stylesheet" href="/public/assets/css/page_discipline.css">
    <link rel="stylesheet" href="/public/assets/css/groups.css">
    <link rel="stylesheet" href="/public/assets/css/page_group.css">
    <link rel="stylesheet" href="/public/assets/css/page_student.css">
    <link rel="stylesheet" href="/public/assets/css/cab.css">
    <link rel="stylesheet" href="/public/assets/css/addGroup.css">
    <link rel="stylesheet" href="/public/assets/css/addDiscipline.css">
    <link rel="stylesheet" href="/public/assets/css/general.css">
    <link rel="stylesheet" href="/public/assets/css/confirmation.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    </style>
    <title></title>
</head>
<body>
<header>
    <div class="header-flex">
        <div class="bar-title">
            <p class="title"><a href="<?= app()->route->getUrl('/main') ?>">Gabella Book</a></p>
        </div>
        <div class="bar">
            <?php
            if (!app()->auth::check()):
                ?>
                <p class="tab-bar"><a href="<?= app()->route->getUrl('/login') ?>">Sign In</a></p>
            <?php
            else:
                ?>
                <ul class="list">
                    <p class="tab-bar"><a href="<?= app()->route->getUrl('/discipline') ?>">Disciplines</a></p>
                    <p class="tab-bar"><a href="<?= app()->route->getUrl('/group') ?>">Groups</a></p>
                    <p class="tab-bar"><a href="<?= app()->route->getUrl('/cab') ?>">Cab</a></p>
                    <p class="tab-bar"><a href="<?= app()->route->getUrl('/logout') ?>">Exit</a></p>
                </ul>
            <?php
            endif;
            ?>
        </div>
    </div>
</header>
<?= $content ?? '' ?>
<footer>
    <div>
        <p>© 2023 - All rights reserved</p>
        <p>gabellabook@gmail.com</p>
    </div>
</footer>
</body>
</html>