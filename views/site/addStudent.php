<?php $groupId = $_GET['group_id'] ?? null; ?>
<main>
    <div class="main-flex-page-add-discipline">
        <div class="card-page-add-discipline">
            <div class="add-discipline-form">
                <div class="form-block">
                    <p class="form-block-title">Add student</p>
                    <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                    <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
                    <form action="" method="post">
                        <div class="input-wrapper">
                            <input required class="input-type" type="text" placeholder="Name" name="name">
                            <input required class="input-type" type="text" placeholder="Surname" name="surname">
                            <input required class="input-type" type="text" placeholder="Mid name" name="mid_name">
                            <input required class="input-type" type="date" placeholder="Born date" name="birth_date">
                            <input required class="input-type" type="text" placeholder="Adress" name="adress">
                            <input type="hidden" name="group_id" value="<?= $groupId ?>">
                            <input class="input-submit" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>