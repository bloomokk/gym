<?php
global $connect;
include_once '../controllers/connect.php';
require_once '../content/header.php';

$id_trainer=$_GET['id_trainer'];
$trainers = $connect->query("SELECT * FROM `users` WHERE `id`=$id_trainer")->fetch_array();
?>
<main>
    <div class="container">
        <div class="flex-column d-flex mx-auto my-4 card mx-auto p-3"  style="max-width: 600px">
            <img class="mx-auto" style="max-width: 500px" src="/assets/pictures/<?=$trainers['avatar']?>" alt="">
            <div class="d-flex flex-column gap-3 my-4 fs-4">
                <div>
                <p class="h2 text-center">ФИО: <?php echo ($trainers['name'] . ' ' . $trainers['surname'] . ' ' . $trainers['middle_name']); ?></p></div>
                <div>Цена: <?=$trainers['price']?></div>
                <div>Описание товара: <?=$trainers['description']?></div>
                <a class="btn btn-primary" href='./record_trainer.php?id_trainer=<?=$trainers['id']?>'>Записаться</a>
            </div>
        </div>
    </div>
</main>
<?php
unset($_SESSION['error_basket']);
require_once 'content/footer.php';
?>