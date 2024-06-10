<?php
global $connect;
include_once '../../controllers/connect.php';
$result = $connect->query("SELECT * FROM record WHERE id = '$_GET[record_id]'");
if (!$result) {
    die("Query failed: " . $connect->error);
}


$error = [];


$time = $_POST["time"];
$date = $_POST["date"];
$up_record = $_POST["up_record"];



if ($up_record){
    if (empty($time)) $error["time_error"] = "Введите время записи";
    if (empty($date)) $error["date_error"] = "Введите дату записи";

    $sql_time = $connect->query("select * from record where time='$time' AND date = '$date' AND id_trainer = $user[id]");
    if ($sql_time->num_rows > 0) $error["add_time_error"]="Запись с таким временем уже существует";

    if ($error) {
        $_SESSION['error_record'] = $error;
        header('Location: /trainer/update_record.php');
        die();
    }
$update = date('y-m-d H:i:s'); 
$connect->query("UPDATE `record` SET `time`='$time', `date`='$date', `updated_at`='$update', WHERE id='$_GET[record_id]'");
}




header("Location:/trainer/update_record.php");

