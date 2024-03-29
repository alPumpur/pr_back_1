<h1 class="text-title">Записи к врачам</h1>
<div class="form-addition" >
    <p class="form-addition-title">Добавить запись</p>
    <form class="form-addition-text" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input class="input" type="text" name="id_doctor" placeholder="Врач"></label>
        <label><input class="input" type="text" name="id_patient" placeholder="Пациент"></label>
        <label><input class="input" type="date" name="date" placeholder="Дата приёма"></label>
        <label><input class="input" type="text" name="assistent" placeholder="Кем записан"></label>
        <button class="button-addition">Добавить</button>
    </form>
</div>
<ul>
    <div class="block">
        <?php
        foreach ($visit as $visit) {
            echo '<div style="    background-color: #c7bdd3;
        border-radius: 25px; padding: 10px 30px 10px 30px;">' ;
            echo '<p>Врач: ' . $visit->id_doctor . '</p>';
            echo '<p>Пациент: ' . $visit->id_patient . '</p>';
            echo '<p>Дата приёма: ' . $visit->date . '</p>';
            echo '<p>Записан: ' . $visit->assistant . '</p>';
            echo '</div>' ;
        }
        ?>
    </div>
</ul>
