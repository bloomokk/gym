<?php
global $connect;
if (isset($_SESSION['user_id']))
    $user=$connect->query("select * from users where id='$_SESSION[user_id]'")->fetch_array(ASSERT_ACTIVE);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <title>Тренажерный зал</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container">
            <a href="/" class="navbar-brand d-flex gap-4">
                <img src="../assets/pictures/logo.png" alt="LOGO" style="width: 50px; height: 50px">
                <div class="align-content-center mt-2 text-white">Тренажерный зал</div>
            </a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="/" class="nav-link text-white">Главная</a></li>
                    <li class="nav-item"><a href="/services.php" class="nav-link text-white">Услуги</a></li>
                    <li class="nav-item"><a href="/about.php" class="nav-link text-white">Спорт. питание</a></li>
                    <li class="nav-item"><a href="/about.php" class="nav-link text-white">Тренеры</a></li>
                    <li class="nav-item"><a href="/about.php" class="nav-link text-white">Отзывы</a></li>
                    <li class="nav-item"><a href="/about.php" class="nav-link text-white">О нас</a></li>
                    <li class="nav-item"><a href="/catalog.php" class="nav-link text-white">Контакты</a></li>
                    <?php if (isset($user)):?>
                    <li class="nav-item"><a href="/basket/index.php" class="nav-link text-white">Корзина</a></li>
                    <li class="nav-item"><a class='nav-link text-white' href='/profile.php'>Личный кабинет</a></li>
                          <?php if ($user['role'] == 1): ?>
                            <li class="nav-item text-white"><a href="../admin/index.php" class="nav-link text-white">Админ</a></li>
                          <?php endif;?>
                    <?php endif;?>
                    <?php if (empty($user)):?>
                    <li><a class='nav-link text-white' href='/auth.php'>Войти</a></li>
                    <li><a class='nav-link text-white' href='/reg.php'>Зарегистрироваться</a></li>
                    <?php endif;?>
                </ul>
            </div>

        </div>
    </nav>
</header>
<div class="wrapper">
