<?php
global $connect;
require_once 'connect.php';

$error = [];

$name=$_POST['name'];
$surname=$_POST['surname'];
$middlename=$_POST['middlename'];
$phone=$_POST['phone'];
$date=$_POST['date'];
$password=$_POST['password'];
$password_confirm=$_POST['password_confirm'];
$submit=$_POST['submit'];
$photo=$_FILES['photo'];
$address=$_POST['address'];

$users_phone = $connect->query("select * from users where phone='$phone'")->fetch_row();

if ($_POST["submit"]){
    if (empty($name)) $error["name_error"]="Введите имя";
    if (empty($surname)) $error["surname_error"]="Введите фамилию";
    if (empty($middlename)) $error["middlename_error"]="Введите отчество";
    if (empty($phone)) $error["phone_error"]="Введите номер телефона";
    if (empty($date)) $error["date_error"]="Введите дату рождения";
    if (empty($address)) $error["address_error"]="Введите адрес";
    if (empty($password)) $error["password_error"]="Введите пароль";
    if ($password !== $password_confirm) $error["password2_error"]="Повторите пароль";

    if (isset($users_phone)) $error["user_phone_error"]="Пользователь с таким номером телефона уже существует";

    if ($error) {
        $_SESSION['error_reg'] = $error;
        header('Location: /reg.php');
        die();
    }
}

if (isset($photo)) {
    $array = explode('.', $photo['name']);
    $file_name = date('dmHis') . '_' . rand(1, 9999) . '.' . end($array);
    $tmp_name = $photo['tmp_name'];
    $path = "../assets/pictures/$file_name";
    move_uploaded_file($tmp_name, $path);
} else {
    die();
}

$sql_create_user = "INSERT INTO `users`(`avatar`, `name`, `surname`, `middle_name`, `phone`, `birthday`, `address`, `password`) VALUES ('$file_name', '$name', '$surname', '$middlename', '$phone', '$date', '$address', '$password')";

$connect->query($sql_create_user);
$user = $connect->query("select id from users where phone='$phone'")->fetch_row();
$_SESSION['user_id'] = $user[0];
print_r($sql_create_user);
header('Location: /profile.php');
