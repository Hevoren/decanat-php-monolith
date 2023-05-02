<?php $disciplineId = $_GET['discipline_id'] ?? null; ?>
<main>
    <div class="confirmation-page">
        <div class="confirmation-page-item">
            <div class="confirmation-label">
                <p>Are you sure?</p>
            </div>
            <div class="confirmation">
                <div class="confirmation-form">
                    <form method="post" class="confirmation-form-button">
                        <input type="hidden" name="group_id" value="<?= $disciplineId ?>">
                        <input class="confirmation-form-button-item" type="submit" value="Yes">
                    </form>
                </div>
                <div class="confirmation-form">
                    <div class="confirmation-form-button2">
                        <a class="confirmation-form-button-item2" href="<?= app()->route->getUrl('/pageGroup') . '?group_id=' . $groupId ?>">No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>