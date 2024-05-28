<?php
global $connect;
require_once '../controllers/connect.php';
require_once '../content/header.php';
$trainers = $connect->query("SELECT * FROM users WHERE role = '2'");

?>

<main class="pt-4">
    <div class="container">
        <div class='text-center'>
            <h1>Наши тренеры</h1>
        </div>
        <div class='justify-content-center d-flex flex-wrap gap-3 mt-4' >
            <?php foreach ($trainers as $item):?>
                <div class='card d-flex flex-column' style="width: 250px">
                    <div class="card-header text-center">
                        <img height="150px" src='../assets/pictures/<?=$item['avatar']?>'>
                    </div>
                    <div class="card-body">
                        <p class="h2">ФИО: <?php echo ($item['name'] . ' ' . $item['surname'] . ' ' . $item['middle_name']); ?></p>
                        <p>Телефон: <?=$item['phone']?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-primary " href='/trainers/trainer_card.php?id_trainer=<?=$item['id']?>'>Записаться</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</main>

