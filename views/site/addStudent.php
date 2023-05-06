<?php $groupId = $_GET['group_id'] ?? null; ?>
<main>
    <div class="main-flex-page-add-discipline">
        <div class="card-page-add-discipline">
            <div class="add-discipline-form">
                <div class="form-block">
                    <p class="form-block-title">Add student</p>
                    <p style="color: red; margin-top: 10px"><?= $message ?? ''; ?></p>
                    <p style="color: #005e00; margin-top: 10px; text-align: center"><?= $messageE ?? ''; ?></p>
                    <p><?= $messageD ?></p>
<!--                    --><?php //if(isset($messageD)){ ?>
<!--                        --><?php //$errorss = json_decode($messageD, true); ?>
<!--                        --><?php //if(count($errorss) > 0){ ?>
<!--                            <ul style="color: red; margin-top: 10px;">-->
<!--                                --><?php //foreach($errorss as $field => $messagess){ ?>
<!--                                    --><?php //foreach($messagess as $messagee){ ?>
<!--                                        <li style="color: red; margin-top: 10px">--><?//= $messagee ?><!--</li>-->
<!--                                    --><?php //} ?>
<!--                                --><?php //} ?>
<!--                            </ul>-->
<!--                        --><?php //} ?>
<!--                    --><?php //} ?>
                    <form action="" method="post">
                        <div class="input-wrapper">
                            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                            <label class="input-type">
                                <input required class="input-type-item-1" type="text" placeholder="Name" name="name">
                            </label>

                            <label class="input-type">
                                <input required class="input-type-item-1" type="text" placeholder="Surname" name="surname">
                            </label>

                            <label class="input-type">
                                <input required class="input-type-item-1" type="text" placeholder="Mid name" name="mid_name">
                            </label>

                            <label class="input-type">
                                <input required class="input-type-item-1" type="date" placeholder="Born date" name="birth_date">
                            </label>

                            <label class="input-type">
                                <input required class="input-type-item-1" type="text" placeholder="Adress" name="adress">
                            </label>

                            <input type="hidden" name="group_id" value="<?= $groupId ?>">
                            <input class="input-submit" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>