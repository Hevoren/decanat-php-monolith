<h1>Список статей</h1>
<ol>
    <?php
    foreach ($students as $student) {
        echo '<li>' . $student->name . '</li>';
    }
    ?>
</ol>