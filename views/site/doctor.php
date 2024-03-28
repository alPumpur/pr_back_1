<h1 class="text-title">Врачи</h1>
<div class="form-addition" >
    <p class="form-addition-title">Добавить врача</p>
    <form class="form-addition-text" method="post">
        <label><input class="input" type="text" name="name" placeholder="ФИО"></label>
        <label><input class="input" type="date" name="date" placeholder="Дата рождения"></label>
        <label><input class="input" type="text" name="post" placeholder="Должность"></label>
        <label><input class="input" type="text" name="specialization" placeholder="Специализация"></label>
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
