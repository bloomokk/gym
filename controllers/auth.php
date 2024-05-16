<?php
global $connect;
require_once 'connect.php';
$phone=$_POST['phone'];
$password=$_POST['password'];
$submit=$_POST['submit'];

$users_phone = $connect->query("select * from users where phone='$phone'")->fetch_array();

if ($submit){
    if (empty($phone)) $error["phone_error"]="Введите номер телефона";
    elseif (empty($users_phone)) $error["phone_log_error"]="Пользователь с таким номером не существует";
    if (empty($password)) $error["password_error"]="Введите Пароль";
    elseif (isset($users_phone) && $users_phone['password'] != $password) $error["password_log_error"]="Не верный пароль";

    if ($error) {
        $_SESSION['error_log'] = $error;
        header('Location: /auth.php');
        die();
    }

    $_SESSION['user_id'] = $users_phone['id'];
    header('Location: /profile.php');
}

