<?php
global $connect, $user;
include_once '../controllers/connect.php';
require_once '../content/header.php';

if (isset($_GET['record_id'])) {
    $record_id = $_GET['record_id'];
    $record = $connect->query("SELECT * FROM record WHERE id = '$record_id'")->fetch_assoc();
}
?>

<section class="py-5">
    <div class="container">
        <div class="card text-bg-dark mx-auto p-3" style="max-width: 800px">
            <h3 class="d-flex justify-content-center">Изменение записи</h3>
            <form action="/trainer/controllers/update_record.php?record_id=<?=$_GET['record_id']?>" class="d-flex flex-column gap-2" method="post" enctype="multipart/form-data">
                <input type="hidden" name="record_id" value="<?php echo $record_id;?>">
                <input type="time" name="time" placeholder="Время" class="form-control" value="<?php echo $record['time'];?>">
                <?php if (isset($_SESSION['error_record']['time_error'])):?>
                    <p class="text-danger"><?php echo $_SESSION['error_record']['time_error'];?></p>
                <?php endif;?>
                <?php if (isset($_SESSION['error_record']['add_time_error'])):?>
                    <p class="text-danger"><?php echo $_SESSION['error_record']['add_time_error'];?></p>
                <?php endif;?>
                <input type="date" name="date" placeholder="Дата" class="form-control" value="<?php echo $record['date'];?>">
                <?php if (isset($_SESSION['error_record']['date_error'])):?>
                    <p class="text-danger"><?php echo $_SESSION['error_record']['date_error'];?></p>
                <?php endif;?>
                <input type="submit" class="btn btn-light" name="up_record">
            </form>
        </div>
    </div>
</section>
<?php
unset($_SESSION['error_record']);
?>