<?php
global $connect;
require_once 'connect.php';
$email=$_POST['email'];
$password=$_POST['password'];
$submit=$_POST['submit'];

$users_email = $connect->query("select * from users where email='$email'")->fetch_array();

if ($submit){
    if (empty($email)) $error["email_error"]="Введите почту";
    elseif (empty($users_email)) $error["email_log_error"]="Пользователь с такой почтой не существует";
    if (empty($password)) $error["password_error"]="Введите Пароль";
    elseif (isset($users_email) && $users_email['password'] != $password) $error["password_log_error"]="Не верный пароль";

    if ($error) {
        $_SESSION['error_log'] = $error;
        header('Location: /auth.php');
        die();
    }

    $_SESSION['user_id'] = $users_email['id'];
    header('Location: /profile.php');
}

