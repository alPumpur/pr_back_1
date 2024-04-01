<h1 class="text-title">Должности</h1>
<div class="form-addition" >
    <p class="form-addition-title">Добавить должность</p>
    <form class="form-addition-text" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <h4 class="form-addition-title"><?= $message ?? ''; ?></h4>
        <label><input class="input" type="text" name="name" placeholder="Название"></label>
        <button class="button-addition">Добавить</button>
    </form>
</div>
<ul>
    <div class="block">
        <?php
        foreach ($position as $position) {
            echo '<div style="    background-color: #c7bdd3;
        border-radius: 25px; padding: 10px 30px 10px 30px;">' ;
            echo '<p>ФИО: ' . $position->name . '</p>';
            echo '</div>' ;
        }
        ?>
    </div>
</ul>
