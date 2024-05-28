<?php
require_once 'controllers/connect.php';
require_once 'content/header.php';
?>
<main class="mt-4">
    <div class="container">
        <form class="d-flex flex-column gap-3 mx-auto" style="max-width: 600px" method="POST" action="controllers/reg.php" enctype=multipart/form-data>
            <div>
                    <label for="form_file" class="form-label">Выберите аватар</label>
                    <input class="form-control " type="file" name="photo" id="form_file">
                    </div>
            <input class="form-control" type="text" name="name" placeholder="Имя">
            <?php if(isset($_SESSION['error_reg']['name_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['name_error']?></p>
            <?php endif;?>
            <input class="form-control" type="text" name="surname" placeholder="Фамилия">
            <?php if(isset($_SESSION['error_reg']['surname_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['surname_error']?></p>
            <?php endif;?>
            <input class="form-control" type="text" name="middlename" placeholder="Отчество">
            <?php if(isset($_SESSION['error_reg']['middlename_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['middlename_error']?></p>
            <?php endif;?>
            <input class="form-control" type="phone" name="phone" placeholder="Номер телефона">
            <?php if(isset($_SESSION['error_reg']['phone_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['phone_error']?></p>
            <?php endif;?>
            <?php if(isset($_SESSION['error_reg']['user_phone_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['user_phone_error']?></p>
            <?php endif;?>
            <?php if(isset($_SESSION['error_reg']['user_phone_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['user_phone_error']?></p>
            <?php endif;?>
            <input class="form-control" type="date" name="date" placeholder="Дата рождения">
            <?php if(isset($_SESSION['error_reg']['date_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['date_error']?></p>
            <?php endif;?>
            <input class="form-control" type="text" name="address" placeholder="Адрес">
            <?php if(isset($_SESSION['error_reg']['address_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['address_error']?></p>
            <?php endif;?>
            <input class="form-control" type="password" name="password" placeholder="Пароль">
            <?php if(isset($_SESSION['error_reg']['password_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['password_error']?></p>
            <?php endif;?>
            <input class="form-control" type="password" name="password_confirm" placeholder="Повторите пароль">
            <?php if(isset($_SESSION['error_reg']['password2_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_reg']['password2_error']?></p>
            <?php endif;?>

            <input type="submit" name="submit" class="btn btn-primary" value="Зарегистрироваться">
        </form>
    </div>
</main>
<?php unset($_SESSION['error_reg']);?>

