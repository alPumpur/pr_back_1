<h1 class="text-title">Врачи</h1>
<div class="form-addition" >
    <p class="form-addition-title">Добавить врача</p>
    <form class="form-addition-text" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h4 class="form-addition-title"><?= $message ?? ''; ?></h4>
        <label><input class="input" type="text" name="name" placeholder="ФИО"></label>
        <label><input class="input" type="date" name="birthdate" placeholder="Дата рождения"></label>
        <p style="margin-bottom: 10px; margin-top: 0; color: #422f57;">Должность</p>
        <select class="input" name="post" id="id">
            <?php
            foreach ($position as $position){
                echo '<option value="' . $position->id . '">' . $position->name . '</option>';
            }
            ?>
        </select>
        <p style="margin-bottom: 10px; margin-top: 0; color: #422f57;">Специализация</p>
        <select class="input" name="specialization" id="specialization">
            <?php
            foreach ($specialization as $specialization){
                echo '<option value="' . $specialization->id . '">' . $specialization->name . '</option>';
            }
            ?>
        </select>
        <div>

        </div>
        <input class="input" type="file" name="image">
        <button class="button-addition">Добавить</button>
    </form>
</div>
<ul>
    <div class="block">
        <?php
        foreach ($doctor as $doctor) {
            echo '<div style="    background-color: #c7bdd3;
        border-radius: 25px; padding: 10px 30px 10px 30px;">' ;
            echo '<p>Врач: ' . $doctor->id . '</p>';
            echo '<p>ФИО: ' . $doctor->name . '</p>';
            echo '<p>Дата рождения: ' . $doctor->birthdate . '</p>';
            echo '<p>Должность: ' . $doctor->post . '</p>';
            echo '<p>Специализация: ' . $doctor->specialization . '</p>';
            echo '<p style="font-size: 24px; margin-bottom: 0; margin-top: 0">
                  <img style="max-width: 90px; height: 60px" src="/public/image/' .  $doctor->image  . '" alt="1"></p>';
            echo '</div>' ;
        }
        ?>
    </div>
</ul>

