<?php
global $connect;
require_once 'controllers/connect.php';
require_once 'content/header.php';
?>
<main class="mt-4">
    <div class="container">
        <form class="d-flex flex-column gap-3 mx-auto mt-5" style="max-width: 600px" method="POST" action="controllers/auth.php">
            <input class="form-control" type="phone" name="phone" placeholder="Телефон">
            <?php if(isset($_SESSION['error_log']['phone_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_log']['phone_error']?></p>
            <?php endif;?>
            <?php if(isset($_SESSION['error_log']['phone_log_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_log']['phone_log_error']?></p>
            <?php endif;?>
            <input class="form-control" type="password" name="password" placeholder="Пароль">
            <?php if(isset($_SESSION['error_log']['password_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_log']['password_error']?></p>
            <?php endif;?>
            <?php if(isset($_SESSION['error_log']['password_log_error'])):?>
                <p class="text-danger"><?= $_SESSION['error_log']['password_log_error']?></p>
            <?php endif;?>
            <input class="btn btn-dark" type="submit" name="submit" class="submit" value="Войти"><br>
            <a class="btn btn-dark text-center" href="reg.php">Зарегистрироваться</a>
        </form>
    </div>
</main>
<?php
unset($_SESSION['error_log']);
?>

