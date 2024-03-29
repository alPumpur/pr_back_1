<h2 class="text-title">Добавление нового сотрудника регистрации</h2>
<h3><?= $message ?? ''; ?></h3>
<div class="form" >
<form class="form-text" method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label><input class="input" type="text" name="name" placeholder="ФИО"></label>
    <label><input class="input" type="text" name="login" placeholder="Логин"></label>
    <label><input class="input" type="password" name="password" placeholder="Пароль"></label>
    <button class="button">Добавить</button>
</form>
</div>