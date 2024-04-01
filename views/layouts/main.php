<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header>
    <nav class="nav">
        <a class="text-nav" href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
        <?php
        if (!app()->auth::check()):
            ?>
            <a class="text-nav" href="<?= app()->route->getUrl('/login') ?>">Вход</a>
        <?php
        else:
            ?>
<!--            <a class="text-nav" href="--><?php //= app()->route->getUrl('/doctor') ?><!--">Врачи</a>-->
            <select class="text-nav" onchange="location = this.value;">
                <option selected disabled>Врачи</option>
                <option value="<?= app()->route->getUrl('/doctor') ?>">Все врачи</option>
                <option value="<?= app()->route->getUrl('/specialization') ?>">Добавить специализацию</option>
                <option value="<?= app()->route->getUrl('/position') ?>">Добавить должность</option>
            </select>
            <a class="text-nav" href="<?= app()->route->getUrl('/patient') ?>">Пациенты</a>
            <a class="text-nav" href="<?= app()->route->getUrl('/visit') ?>">Записи к врачам</a>
            <a class="text-nav" href="<?= app()->route->getUrl('/signup') ?>">Сотрудники</a>
            <a class="text-nav" href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>