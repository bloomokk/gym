<?php
global $connect, $user;
include_once '../controllers/connect.php';
require_once '../content/header.php';
if ($user['role'] = 0) header('Location: /');
?>

<main>
    <div class="container">
        <ul class="nav d-flex justify-content-center">
            <li class="nav-item btn btn-outline-primary"><a href="?page=price" class="nav-link">Изменить цену</a></li>
            <li class="nav-item btn btn-outline-primary"><a href="?page=record" class="nav-link">Добавить запись</a></li>
            <li class="nav-item btn btn-outline-primary"><a href="?page=records" class="nav-link">Мои записи</a></li>
        </ul>
    </div>
    <?php if(isset($_GET['page'])):?>
        <?php if ($_GET['page'] == 'record') include_once 'add_record.php'?>
        <?php if ($_GET['page'] == 'records') include_once 'records.php'?>
        <?php if ($_GET['page'] == 'price') include_once 'update_price.php'?>
    <?php endif;?>
</main>





