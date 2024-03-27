

<h1>Врачи</h1>
<ul>
    <?php
    foreach ($doctor as $doctor) {
        echo '<p>ФИО: ' . $doctor->name . '</p>';
        echo '<p>Дата рождения: ' . $doctor->birthdate . '</p>';
        echo '<p>Должность: ' . $doctor->post . '</p>';
        echo '<p>Специализация: ' . $doctor->specialization . '</p>';
        echo '<br>' ;
    }
    ?>
</ul>