<?php 
global $connect, $user;
require_once '../controllers/connect.php';
require_once '../content/header.php';
$id_trainer=$_GET['id_trainer'];
$record = $connect->query("select * from record where busy = 0");
?>
<main class="pt-4">
    <div class="container">
        <div class='text-center'>
            <h1>Выберите время</h1>
        </div>
        <div class='justify-content-center d-flex flex-wrap gap-3 mt-4' >
            
                <div class='card d-flex flex-column' style="width: 250px">
                    <div class="card-footer text-center">
<?php if ($record->num_rows == 0) {
    echo "<p>Свободной записи нет</p>";
} else {
    while ($item = $record->fetch_assoc()) {
        echo "<a class='btn btn-primary' href='../controllers/record/record_trainer.php?id_record={$item['id']}&id_trainer={$id_trainer}'>{$item['time']}</a>";
    }
}
?>
                            
                            
                    </div>
                </div>
        </div>
    </div>
</main>
