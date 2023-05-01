<main>
    <div class="login-form">
        <div class="form-block">
            <p class="form-block-title">Sign Up</p>
            <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
            <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
            <form action="" method="post">
                <div class="input-wrapper">
                    <input class="input-type" type="text" placeholder="Name" name="name">
                    <input class="input-type" type="text" placeholder="Login" name="login">
                    <input class="input-type" type="password" placeholder="Password" name="password">
                    <input class="input-submit" type="submit" value="Submit">
                    <a class="offer-a" href="<?= app()->route->getUrl('/login') ?>">Already registered?</a>
                </div>
            </form>
        </div>
    </div>
</main>