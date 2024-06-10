<?php 
global $connect, $user;
include "../controllers/connect.php";

$rating = $_POST['rating'];
$text = $_POST['text'];
$id_trainer = $_POST['coach'];

$query = "INSERT INTO `reviews_coach` (`id_trainer`, `stars`, `text`, `user_id`) VALUES ('$id_trainer','$rating','$text','$user[id]')";
$run_query = mysqli_query($connect, $query);
header("Location: /trainers/trainer_card.php?id_trainer='$id_trainer'");
?>