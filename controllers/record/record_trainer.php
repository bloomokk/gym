<?php
global $connect, $user;
include_once '../connect.php';
$error = [];

$id_trainer=$_GET['id_trainer'];
$id_record=$_GET['id_record'];
if (empty($user)){
    $error['session_user']='Вы не авторизованы';
    if ($error) {
        $_SESSION['error_record'] = $error;
        header("Location: /trainers/trainer_card.php?id_trainer='$id_trainer'");
        die();
    }
}

$connect->query("UPDATE `record` SET `busy` = '1', `user_id` = '$user[id]' WHERE `record`.`id` = $id_record");
header("Location: /trainers/trainer_card.php?id_trainer='$id_trainer'");