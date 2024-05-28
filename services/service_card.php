<?php
global $connect;
include_once '../controllers/connect.php';
require_once '../content/header.php';

$id_service=$_GET['id_service'];
$services = $connect->query( "SELECT * FROM `services` WHERE `id`=$id_service")->fetch_array();
?>
<main>
    <div class="container">
        <div class="flex-column d-flex mx-auto my-4 card mx-auto p-3"  style="max-width: 600px">
            <img class="mx-auto" style="max-width: 500px" src="/assets/pictures/<?=$services['photo']?>" alt="">
            <div class="d-flex flex-column gap-3 my-4 fs-4">
                <div>Наименование: <?=$services['name']?></div>
                <div>Цена: <?=$services['price']?></div>
                <div>Описание товара: <?=$services['description']?></div>
                <a class="btn btn-primary" href='controllers/add_basket.php?id_service=<?=$services['id']?>'>В корзину</a>
            </div>
        </div>
    </div>
</main>
<?php
unset($_SESSION['error_basket']);
require_once 'content/footer.php';
?>