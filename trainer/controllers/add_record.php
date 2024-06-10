<?php
global $connect, $user;
require_once "../../controllers/connect.php";

$time = $_POST["time"];
$date = $_POST["date"];
$add_record = $_POST["add_record"];

echo $time;
echo $date;
echo $user['id'];

if (isset($add_record)) {
    if (empty($time)) $error["time_error"] = "Введите время записи";
    if (empty($date)) $error["date_error"] = "Введите дату записи";

    $sql_time = $connect->query("select * from record where time='$time' AND date = '$date' AND id_trainer = $user[id]");
    if ($sql_time->num_rows > 0) $error["add_time_error"]="Запись с таким временем уже существует";

    if ($error) {
        $_SESSION['error_record'] = $error;
        header('Location: /trainer/index.php?page=record');
        die();
    }

    $stmt = $connect->prepare("INSERT INTO `record` (`time`, `date`, `id_trainer`) VALUES (?,?,?)");
    $stmt->bind_param("ssi", $time, $date, $user['id']);
    $stmt->execute();
    header('Location: /trainer/index.php?page=record');
}



