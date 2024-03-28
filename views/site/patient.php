<h1 class="text-title">Пациенты</h1>
<ul>
<div class="block">
    <?php
    foreach ($patient as $patient) {
        echo '<div style="    background-color: #c7bdd3;
        border-radius: 25px; padding: 10px 30px 10px 30px;">' ;
        echo '<p>ФИО: ' . $patient->name . '</p>';
        echo '<p>Дата рождения: ' . $patient->birthdate . '</p>';
        echo '</div>' ;
    }
    ?>
</div>
</ul>