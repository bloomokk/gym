<?php
global $connect, $user;
include_once '../../controllers/connect.php';

if (!isset($_GET['price_id']) || empty($_GET['price_id'])) {
    header('Location: /trainer/index.php?page=price');
    die();
}

$result = $connect->query("SELECT * FROM price_trainer WHERE id = '{$_GET['price_id']}'");
if (!$result) {
    die("Query failed: " . $connect->error);
}
$price_id = $_GET['price_id'];
$error = [];

if (isset($_POST["up_price"])) {
    $price = $_POST["price"];
    if (empty($price)) {
        $error["price_error"] = "Введите время записи";
    }

    if ($error) {
        $_SESSION['error_price'] = $error;
        header('Location: /trainer/index.php?page=price');
        die();
    }

    $query = "UPDATE `price_trainer` SET `price` = '$price', `id_trainer` = '$user[id]' WHERE `price_trainer`.`id` = '$price_id'";
    $connect->query($query);
}

header('Location: /trainer/index.php?page=price');