<?php
global $connect, $user;
include_once '../controllers/connect.php';
require_once '../content/header.php';
if ($user['role'] != 1) header('Location: /')
?>

<main>
    <!--nvrakoh9 5aTPs5pYuK3g -->
    <div class="container">
        <ul class="nav d-flex justify-content-center">
            <li class="nav-item btn btn-outline-primary"><a href="?page=user" class="nav-link">Пользователи</a></li>
            <li class="nav-item btn btn-outline-primary"><a href="?page=services" class="nav-link">Услуги</a></li>
        </ul>
    </div>
    <?php if(isset($_GET['page'])):?>
        <?php if ($_GET['page'] == 'user') include_once 'view_users.php'?>
        <?php if ($_GET['page'] == 'services') include_once 'view_services.php'?>
    <?php endif;?>
</main>





