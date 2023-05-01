<main>
    <div class="main-flex-cab">
        <div class="cab">
            <div class="left-column-cab">
                <p class="cab-title">Incoming requests:</p>
                <?php foreach ($users as $user) { ?>
                    <div class="requests">
                        <p class="user-name"><?= $user->name ?></p>
                        <form method="post" class="request-button">
                            <input type="hidden" name="id" value="<?= $user->password ?>">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <button class="accept-user" type="submit">Accept</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class="right-column-cab">
                <p class="cab-title">Current users:</p>
                <?php foreach ($activeUsers as $user) { ?>
                    <div class="requests">
                        <p class="user-name"><?= $user->name ?></p>
                        <form method="post" class="request-button">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <button class="accept-user" type="submit">Lay off</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</main>