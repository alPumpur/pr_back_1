<h2 class="text-title">Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<div class="form" >
<form class="form-text" method="post">
    <label><input class="input" type="text" name="name" placeholder="ФИО"></label>
    <label><input class="input" type="text" name="login" placeholder="Логин"></label>
    <label><input class="input" type="password" name="password" placeholder="Пароль"></label>
    <label><input class="input" type="text" name="role" placeholder="Роль"></label>
    <button class="button">Зарегистрироваться</button>
</div>
</form>