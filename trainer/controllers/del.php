<?php
global $connect;
require_once '../../controllers/connect.php';

$connect->query("UPDATE `record` SET `busy` = '0', `user_id` = NULL WHERE `record`.`id` = '$_GET[record_id]'");
header('Location: /trainer/index.php?page=records');
?>