<h3><?= $message ?? ''; ?></h3>
<h3><?= app()->auth->user()->login ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <main>
        <div class="login-form">
            <div class="form-block">
                <p class="form-block-title">Sign In</p>
                <form action="" method="post">
                    <div class="input-wrapper">
                        <input class="input-type" type="text" placeholder="Login" name="login">
                        <input class="input-type" type="password" placeholder="Password" name="password">
                        <input class="input-submit" type="submit" value="submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php endif;