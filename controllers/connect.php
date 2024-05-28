<?php
session_start();
$connect=mysqli_connect('localhost', 'root', '', 'gym');
if (isset($_SESSION['user_id'])) $user = $connect->query("select * from users where id='$_SESSION[user_id]'")->fetch_array();   
?>
