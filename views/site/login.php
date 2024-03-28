<h2 class="text-title">Вход в систему</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
<div class="form" >
    <form class="form-text" method="post">
        <label > <input class="input" type="text" name="login" placeholder="Логин"></label>
        <label > <input class="input" type="password" name="password" placeholder="Пароль"></label>
        <button class="button">Войти</button>
    </form>
</div>
<?php endif;