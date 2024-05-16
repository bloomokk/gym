<?php
global $connect, $user;
require_once 'controllers/connect.php';
require_once 'content/header.php'; 
?>
<main class="mt-4">
    <div class="container">
        <div class="card text-bg-dark bg-opacity-50 mx-auto p-3" style="max-width: 800px">
            <div class="d-flex flex-column text-center">
                <h3>Профиль</h3>
                <p class="h2">ФИО: <?php echo ($user['name'] . ' ' . $user['surname'] . ' ' . $user['middle_name']); ?></p>
                <p class="h4">Дата рождения: <?=$user['birthday']?></p>
                <p class="h4">Телефон: <?=$user['phone']?></p>
                <p class="h4">Место жительства: <?=$user['address']?></p>
            </div>
            <div class="d-flex justify-content-center gap-3">
                <a href='update.php' class="btn btn-outline-dark">Изменить</a><br>
                <a href='controllers/exit.php' class="btn btn-outline-danger">Выйти</a>
            </div>
        </div>
    </div>
</main>
