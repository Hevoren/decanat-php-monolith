<h1>Students</h1>
<ol>
    <?php
    foreach ($students as $student) {
        echo '<li>' . $student->name . '</li>';
    }
    ?>
</ol>