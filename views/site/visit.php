<h1>Пациенты</h1>
<ul>
    <?php
    foreach ($visit as $visit) {
        echo '<p>Врач: ' . $visit->id_doctor . '</p>';
        echo '<p>Пациент: ' . $visit->id_patient . '</p>';
        echo '<p>Дата приёма: ' . $visit->date . '</p>';
        echo '<p>Статус: ' . $visit->status . '</p>';
        echo '<p>Записан: ' . $visit->assistant . '</p>';
        echo '<br>' ;
    }
    ?>
</ul>