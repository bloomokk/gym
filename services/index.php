<?php
global $connect;
require_once '../controllers/connect.php';
require_once '../content/header.php';
$services = $connect->query("select * from services")->fetch_all(ASSERT_ACTIVE);
?>

<main class="pt-4">
    <div class="container">
        <div class='text-center'>
            <h1>Наши услуги</h1>
        </div>
        <div class='justify-content-center d-flex flex-wrap gap-3 mt-4' >
            <?php foreach ($services as $item):?>
                <div class='card d-flex flex-column' style="width: 250px">
                    <div class="card-header text-center">
                        <img  height="150px" src='../assets/pictures/<?=$item['photo']?>'>
                    </div>
                    <div class="card-body">
                        <p><?=$item['name']?></p>
                        <p><?=$item['price']?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-primary " href='/services/service_card.php?id_service=<?=$item['id']?>'>Записаться</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</main>

