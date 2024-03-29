<h1 class="text-title">Пациенты</h1>
<div class="form-addition" >
    <p class="form-addition-title">Добавить пациента</p>
    <form class="form-addition-text" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input class="input" type="text" name="name" placeholder="ФИО"></label>
        <label><input class="input" type="date" name="birthdate" placeholder="Дата рождения"></label>
        <button class="button-addition">Добавить</button>
    </form>
</div>
<ul>
    <div class="block">
        <?php
        foreach ($patient as $patient) {
            echo '<div style="    background-color: #c7bdd3;
        border-radius: 25px; padding: 10px 30px 10px 30px;">' ;
            echo '<p>ФИО: ' . $patient->name . '</p>';
            echo '<p>Дата рождения: ' . $patient->birthdate . '</p>';
            echo '<button class="button-addition">Врачи</button>';
            echo '</div>' ;
        }
        ?>
    </div>
</ul>
