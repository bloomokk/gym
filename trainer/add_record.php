<?php
global $connect, $user;
include_once '../controllers/connect.php';
require_once '../content/header.php';
$record = $connect->query("SELECT * FROM record WHERE busy = 0 AND id_trainer = $user[id]")->fetch_all(MYSQLI_ASSOC);
?>

    <section class="py-5">
        <div class="container">
            <div class="card text-bg-dark mx-auto p-3" style="max-width: 800px">
                <h3 class="d-flex justify-content-center">Добавление записи</h3>
                <form action="/trainer/controllers/add_record.php" class=" d-flex flex-column gap-2" method="post" enctype="multipart/form-data">
                    <input  type="time" name="time" placeholder="Время" class="form-control">
                    <?php if(isset($_SESSION['error_record']['time_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_record']['time_error']?></p>
                    <?php endif;?>
                    <?php if(isset($_SESSION['error_record']['add_time_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_record']['add_time_error']?></p>
                    <?php endif;?>
                    <input type="date" name="date" placeholder="Дата" class="form-control">
                    <?php if(isset($_SESSION['error_record']['date_error'])):?>
                        <p class="text-danger"><?= $_SESSION['error_record']['date_error']?></p>
                    <?php endif;?>
                    <input type="submit" class="btn btn-light" name="add_record">
                </form>
            </div>
        </div>
    </section>

    <section class="container">
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>time</th>
                <th>date</th>
                <th>busy</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Редактировать</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($record as $item):?>
                <tr>
                    <td><?=$item["id"]?></td>
                    <td><?=$item["time"]?></td>
                    <td><?=$item["date"]?></td>
                    <td><?=$item["busy"]?></td>
                    <td><?=$item["created_at"]?></td>
                    <td><?=$item["updated_at"]?></td>
                    <td><a href="/trainer/update_record.php?record_id=<?=$item["id"]?>">Изменить</a></td>
                    <td><a href="/trainer/controllers/del.php?record_id=<?=$item["id"]?>">Удалить</a></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </section>
<?php
unset($_SESSION['error_record']);
unset($_SESSION['time_error']);
?>