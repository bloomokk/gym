<?php
global $connect, $user;
require_once '../controllers/connect.php';
require_once '../content/header.php';
$out_update = $connect->query("SELECT * FROM `users` where id='$_GET[id_user]'")->fetch_array(ASSERT_ACTIVE);
$id_user=$_GET['id_user'];
?>

<main class="py-5">
  <div class="container">
    <div class="card text-bg-dark mx-auto p-3" style="max-width: 600px">
      <h3>Изменить пользователя</h3>
<form method="POST" action="controllers/users/update.php?id_user=<?=$id_user?>"> 
        <div>
            <label for="form_file" class="form-label">Выберите аватар</label>
            <input class="form-control" type="file" name="photo" id="form_file">
        </div>
            <input class="form-control mt-3 mt-3" type="text" name="name" placeholder="Имя">
            <?php if(isset($_SESSION['error_reg']['name_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['name_error']?></p>
            <?php endif;?>
            <input class="form-control mt-3" type="text" name="surname" placeholder="Фамилия">
            <?php if(isset($_SESSION['error_reg']['surname_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['surname_error']?></p>
            <?php endif;?>
            <input class="form-control mt-3" type="text" name="middlename" placeholder="Отчество">
            <?php if(isset($_SESSION['error_reg']['middlename_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['middlename_error']?></p>
            <?php endif;?>
            <input class="form-control mt-3" type="phone" name="phone" placeholder="Номер телефона">
            <?php if(isset($_SESSION['error_reg']['phone_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['phone_error']?></p>
            <?php endif;?>
            <?php if(isset($_SESSION['error_reg']['user_phone_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['user_phone_error']?></p>
            <?php endif;?>
            <?php if(isset($_SESSION['error_reg']['user_phone_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['user_phone_error']?></p>
            <?php endif;?>
            <input class="form-control mt-3" type="date" name="date" placeholder="Дата рождения">
            <?php if(isset($_SESSION['error_reg']['date_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['date_error']?></p>
            <?php endif;?>
            <input class="form-control mt-3" type="text" name="address" placeholder="Адрес">
            <?php if(isset($_SESSION['error_reg']['address_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['address_error']?></p>
            <?php endif;?>
            <input class="form-control mt-3" type="password" name="password" placeholder="Пароль">
            <?php if(isset($_SESSION['error_reg']['password_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['password_error']?></p>
            <?php endif;?>
    <input type="submit" name="up_user" class="btn btn-light mt-3" value="Изменить">
</form>
  </div>
</main>
<?php
unset($_SESSION['error_up_users']);
?>