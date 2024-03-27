<h1>Пациенты</h1>
<ul>
    <?php
    foreach ($patient as $patient) {
        echo '<p>ФИО: ' . $patient->name . '</p>';
        echo '<p>Дата рождения: ' . $patient->birthdate . '</p>';
        echo '<br>' ;
    }
    ?>
</ul>