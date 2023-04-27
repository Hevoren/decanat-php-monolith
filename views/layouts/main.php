<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<header>
    <nav>
        <a href="<?= app()->route->getUrl('/hello') ?>">Gabella</a>
        <?php
            if (!app()->auth::check()):
        ?>
            <a href="<?= app()->route->getUrl('/login') ?>">Sign In</a>
        <?php
            else:
        ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Exit (<?= app()->auth::user()->login ?>)</a>
        <?php
            endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>
