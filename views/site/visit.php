<h1 class="text-title">Записи к врачам</h1>
<ul>
    <div class="block">
    <?php
    foreach ($visit as $visit) {
        echo '<div style="    background-color: #c7bdd3;
        border-radius: 25px; padding: 10px 30px 10px 30px;">' ;
        echo '<p>Врач: ' . $visit->id_doctor . '</p>';
        echo '<p>Пациент: ' . $visit->id_patient . '</p>';
        echo '<p>Дата приёма: ' . $visit->date . '</p>';
        echo '<p>Статус: ' . $visit->status . '</p>';
        echo '<p>Записан: ' . $visit->assistant . '</p>';
        echo '</div>' ;
    }
    ?>
    </div>
</ul>