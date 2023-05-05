<?php

use Model\Uploads;
use Src\Auth\Auth;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathh = $_SERVER['REQUEST_URI'];
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

$upload = Uploads::where('id', $user_id)->orderBy('created_at', 'desc');
$upload = $upload->first();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel="stylesheet" href="../php-framework/public/assests/login.css">-->
    <!--    <link rel="stylesheet" href="/public/assets/login.css">-->

    <link rel="stylesheet" href="../php-framework/public/assets/css/login.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/main.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/disciplines.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/students.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/page_discipline.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/groups.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/page_group.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/page_student.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/cab.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/addGroup.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/addDiscipline.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/general.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/confirmation.css">
    <link rel="stylesheet" href="../php-framework/public/assets/css/uploadPhoto.css">
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
                <div class="login-block">
                    <p class="tab-bar"><a href="<?= app()->route->getUrl('/login') ?>">Sign In</a></p>
                </div>
            <?php
            else:
                ?>

                <div class="block-list">
                    <ul class="list">

                        <?php if (!(strpos($_SERVER['REQUEST_URI'], '/discipline') !== false || strpos($_SERVER['REQUEST_URI'], '/group') !== false || strpos($_SERVER['REQUEST_URI'], '/student') !== false)): ?>
                            <div class="empty">
                            </div>
                        <?php endif; ?>
                        <?php if (strpos($_SERVER['REQUEST_URI'], '/discipline') !== false || strpos($_SERVER['REQUEST_URI'], '/group') !== false || strpos($_SERVER['REQUEST_URI'], '/student') !== false): ?>
                            <div class="search-block">
                                <form class="search-block-form" method="get" action="searchResults">
                                    <input type="hidden" name="currentPage" value="<?= $path ?>">
                                    <input type="hidden" name="currentPagee" value="<?= $pathh ?>">
                                    <input required class="search-block-form-input" type="text"
                                           name="searchRequest" placeholder="Search">
                                    <input class="search-block-form-submit" type="submit" value="GO">
                                </form>
                            </div>
                        <?php endif; ?>
                        <div class="block-photo">
                            <a class="photo-link"
                               href="<?= app()->route->getUrl('/uploadPhoto') . '?id=' . $user_id ?>">
                                <img src="../php-framework/public/assets/img/<?= $upload->upload_name ?>">
                            </a>
                        </div>
                        <p class="tab-bar"><a href="<?= app()->route->getUrl('/discipline') ?>">Disciplines</a></p>
                        <p class="tab-bar"><a href="<?= app()->route->getUrl('/group') ?>">Groups</a></p>
                        <?php if (app()->auth::userHasRole(1)): ?>
                            <p class="tab-bar"><a href="<?= app()->route->getUrl('/cab') ?>">Cab</a></p>
                        <?php endif; ?>
                        <p class="tab-bar"><a href="<?= app()->route->getUrl('/logout') ?>">Exit</a></p>
                    </ul>
                </div>

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