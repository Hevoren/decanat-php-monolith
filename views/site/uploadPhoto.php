<?php

use Src\Auth\Auth;

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

?>
<main>
    <div class="main-flex-discipline">
        <div class="div-main-title-discipline">
            <p class="main-title">Add Photo</p>
        </div>
        <img class="img-upload-photo" src="/public/assets/img/<?= $upload->upload_name ?>">
        <form class="form-upload-photo" action="/uploadPhoto" method="post" enctype="multipart/form-data">
            <div class="upload-photo">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <input type="hidden" name="user" value="<?= $user_id ?>">
                <input class="upload-photo-input" type="file" name="image" required>
                <input class="upload-photo-submit" type="submit">
            </div>
        </form>

    </div>
</main>