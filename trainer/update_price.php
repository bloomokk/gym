<?php
global $connect, $user;
include_once '../controllers/connect.php';
require_once '../content/header.php';
if (isset($user['id'])) {
    $id_trainer = $user['id'];
    $trainer = $connect->query("SELECT * FROM price_trainer WHERE id_trainer = $id_trainer")->fetch_assoc();
}
?>
<section class="py-5">
    <div class="container">
        <div class="card text-bg-dark mx-auto p-3" style="max-width: 800px">
            <h3 class="d-flex justify-content-center">Изменение цены</h3>
            <form action="/trainer/controllers/up_price.php?price_id=<?=$trainer['id']?>" class="d-flex flex-column gap-2" method="post" enctype="multipart/form-data">
                <input type="number" name="price" placeholder="Цена" class="form-control" value="<?php echo $trainer['price'];?>">
                <?php if (isset($_SESSION['error_price']['price_error'])):?>
                    <p class="text-danger"><?php echo $_SESSION['error_price']['price_error'];?></p>
                <?php endif;?>
                <input type="submit" class="btn btn-light" name="up_price">
            </form>
        </div>
    </div>
</section>
<?php
unset($_SESSION['error_price']);
?>