<main>
    <div class="login-form">
        <div class="form-block">
            <p class="form-block-title">Sign Up</p>
            <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
            <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
            <p><?= $messageD ?? '' ?></p>
<!--            --><?php //if (isset($messageD)) { ?>
<!--                --><?php //$errorss = json_decode($messageD, true); ?>
<!--                --><?php //if (count($errorss) > 0) { ?>
<!--                    <ul style="color: red; margin-top: 10px;">-->
<!--                        --><?php //foreach ($errorss as $field => $messagess) { ?>
<!--                            --><?php //foreach ($messagess as $messagee) { ?>
<!--                                <li style="color: red; margin-top: 10px">--><?//= $messagee ?><!--</li>-->
<!--                            --><?php //} ?>
<!--                        --><?php //} ?>
<!--                    </ul>-->
<!--                --><?php //} ?>
<!--            --><?php //} ?>
            <form action="" method="post">
                <div class="input-wrapper">
                    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

                    <label class="input-type">
                        <input required class="input-type-login-item" type="text" placeholder="Name" name="name">
                    </label>

                    <label class="input-type">
                        <input required class="input-type-login-item" type="text" placeholder="Login" name="login">
                    </label>

                    <label class="input-type">
                        <input required class="input-type-login-item" type="password" placeholder="Password"
                               name="password">
                    </label>

                    <input class="input-submit" type="submit" value="Submit">
                    <a class="offer-a" href="<?= app()->route->getUrl('/login') ?>">Already registered?</a>
                </div>
            </form>
        </div>
    </div>
</main>