<h1 class="text-title">Записи к врачам</h1>
<div class="form-addition" >
    <p class="form-addition-title">Добавить запись</p>
    <form class="form-addition-text" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <!--        <label><input class="input" type="text" name="id_doctor" placeholder="Врач"></label>-->
        <p style="margin-bottom: 10px; margin-top: 0; color: #422f57;">Врач</p>
        <select class="input" name="id_doctor" id="id">
            <?php
            foreach ($doctor as $doctor){
                echo '<option value="' . $doctor->id . '">' . $doctor->name . '</option>';
            }
            ?>
        </select>
        <!--        <label><input class="input" type="text" name="id_patient" placeholder="Пациент"></label>-->
        <p style="margin-bottom: 10px; margin-top: 0; color: #422f57;">Пациент</p>
        <select class="input" name="id_patient" id="id">
            <?php
            foreach ($patient as $patient){
                echo '<option value="' . $patient->id . '">' . $patient->name . '</option>';
            }
            ?>
        </select>
        <label><input class="input" type="datetime-local" name="date" placeholder="Дата приёма"></label>
        <!--        <label><input class="input" type="text" name="assistent" placeholder="Кем записан"></label>-->
        <p style="margin-bottom: 10px; margin-top: 0; color: #422f57;">Кем записан</p>
        <select class="input" name="assistant" id="id">
            <?php
            foreach ($user as $user){
                echo '<option value="' . $user->id . '">' . $user->name . '</option>';
            }
            ?>
        </select>
        <button class="button-addition">Добавить</button>
    </form>
</div>
<div class="form-addition" >
        <form action="" method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <input class="input" style="width: 230px" type="search" name="search" id="search-input" placeholder="Поиск по врачам и пациентам">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <button class="button-addition">Поиск</button>
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
