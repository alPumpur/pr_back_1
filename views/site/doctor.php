<h1 class="text-title">Врачи</h1>
<div class="form-addition" >
    <p class="form-addition-title">Добавить врача</p>
    <form class="form-addition-text" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input class="input" type="text" name="name" placeholder="ФИО"></label>
        <label><input class="input" type="date" name="birthdate" placeholder="Дата рождения"></label>
<!--        <label><input class="input" type="text" name="post" placeholder="Должность"></label>-->
        <p>Должность</p>
        <select class="input" name="post" id="id">
            <?php
            foreach ($position as $position){
                echo '<option value="' . $position->id . '">' . $position->name . '</option>';
            }
            ?>
        </select>
<!--        <label><input class="input" type="text" name="specialization" placeholder="Специализация"></label>-->
        <p>Специализация</p>
        <select class="input" name="specialization" id="specialization">
            <?php
            foreach ($specialization as $specialization){
                echo '<option value="' . $specialization->id . '">' . $specialization->name . '</option>';
            }
            ?>
        </select>
        <button class="button-addition">Добавить</button>
    </form>
</div>
<ul>
    <div class="block">
        <?php
        foreach ($doctor as $doctor) {
            echo '<div style="    background-color: #c7bdd3;
        border-radius: 25px; padding: 10px 30px 10px 30px;">' ;
            echo '<p>ФИО: ' . $doctor->name . '</p>';
            echo '<p>Дата рождения: ' . $doctor->birthdate . '</p>';
            echo '<p>Должность: ' . $doctor->post . '</p>';
            echo '<p>Специализация: ' . $doctor->specialization . '</p>';
            echo '<button class="button-addition">Пациенты</button>';
            echo '</div>' ;
        }
        ?>
    </div>
</ul>
