
<h3><?= app()->auth->user()->login ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <main>
        <div class="login-form">
            <div class="form-block">
                <p class="form-block-title">Sign In</p>
                <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                <form action="" method="post">
                    <div class="input-wrapper">
                        <input class="input-type" type="text" placeholder="Login" name="login">
                        <input class="input-type" type="password" placeholder="Password" name="password">
                        <input class="input-submit" type="submit" value="submit">
                            <a class="offer-a" href="<?= app()->route->getUrl('/register') ?>" > Need an account?</a>
                    </div>
                </form>

            </div>
        </div>
    </main>
<?php endif;