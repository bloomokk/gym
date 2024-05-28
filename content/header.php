<?php
global $connect;
if (isset($_SESSION['user_id'])) $user = $connect->query("select * from users where id='$_SESSION[user_id]'")->fetch_array();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Тренажерный зал</title>
</head>
<body>
<style>
    .link-hover-class:hover {
        opacity: .7;
    }
	.menu-desktop {
		@media (max-width: 1023px) {
			display: none;
        }
	}
	.menu-modal {
        display: none;
        @media (max-width: 1023px) {
            display: block;
        }
	}
</style>
<header>
    <nav class="navbar navbar-expand bg-black">
        <div class="container">
            <a class="navbar-brand" href="/index.php">
                <img src="../assets/pictures/logo.php" alt="LOGO"  height="65">
            </a>
			<div class="justify-content-end fs-5 collapse navbar-collapse" >
				<ul class="navbar-nav menu-desktop" style="align-items: center">
					<li class="nav-item"><a href="/" class="nav-link text-white">Главная</a></li>
					<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/services/index.php">Услуги</a></li>
					<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Спортпит</a></li>
					<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/trainers/index.php">Тренеры</a></li>
					<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Отзывы</a></li>
					<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">О нас</a></li>
					<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Контакты</a></li>
                  <?php if(empty($_SESSION['user_id'])):?>
							  <li class="nav-item"><a href="/auth.php" class="nav-link text-white">Вход</a></li>
							  <li class="nav-item"><a href="/reg.php" class="nav-link text-white">Регистрация</a></li>
                  <?php endif;?>
                  <?php if(isset($_SESSION['user_id'])):?>
					<li class="nav-item"><a href="/basket/index.php" class="nav-link text-white link-hover-class">Корзина</a></li>
                  <?php endif;?>
                  <?php if (isset($user) and $user['role'] == 1):?>
					  <li class="nav-item"><a href="/admin/index.php" class="nav-link text-white link-hover-class">Админ панель</a></li>
                  <?php endif;?>
				  <?php if (isset($user) and $user['role'] == 2):?>
					  <li class="nav-item"><a href="/trainer/index.php" class="nav-link text-white link-hover-class">Тренер</a></li>
                  <?php endif;?>
                  <?php if(isset($_SESSION['user_id'])):?>
					  <li class="nav-item">
						  <a href="/profile.php" class="nav-link text-white d-flex gap-3 link-hover-class" style="align-items: center">
							  <p style="margin-top: 16px;"><?=$user['login']?></p>
							  <img class="rounded-circle"  src="<?php if (isset($user['avatar'])) echo  "../assets/pictures/$user[avatar]";
                              else echo "../assets/pictures/user.png"
                              ?>" alt="" height="45" width="45">
						  </a>
					  </li>
                  <?php endif;?>
				</ul>
				<ul class="navbar-nav menu-modal">
					<li class="nav-item dropdown">
						<div class="dropdown">
						<a class="nav-link my-btn-mobile btn btn-secondary dropdown-toggle text-white">
							Меню
						</a>
						<ul class="my-menu-mobile dropdown-menu navbar-nav  bg-white rounded-2 p-4" style="z-index: 1; display: none; position: absolute">
						<li class="nav-item"><a href="/" class="nav-link dropdown-item text-white">Главная</a></li>
						<li class="nav-item"><a class="nav-link text-white dropdown-item link-hover-class" href="/product/index.php">Услуги</a></li>
						<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Спортпит</a></li>
						<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Тренеры</a></li>
						<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Отзывы</a></li>
						<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">О нас</a></li>
						<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Контакты</a></li>
                          <?php if(empty($_SESSION['user_id'])):?>
							  <li class="nav-item"><a href="/login/index.php" class="nav-link">Вход</a></li>
							  <li class="nav-item"><a href="/registration/index.php" class="nav-link ">Регистрация</a></li>
                          <?php endif;?>
							<li class="nav-item"><a href="/basket/index.php" class="nav-link link-hover-class">Корзина</a></li>
                          <?php if ($user['role'] == 1):?>
							  <li class="nav-item"><a href="/admin/index.php" class="nav-link link-hover-class">Админ панель</a></li>
                          <?php endif;?>

						</ul>
					</div>
					</li>
                      <?php if(isset($_SESSION['user_id'])):?>
					<li class="nav-item">
						<a href="/user/" class="nav-link text-white d-flex gap-3 link-hover-class" style="align-items: center">
							<p style="margin-top: 16px;"><?=$user['login']?></p>
							<img class="rounded-circle"  src="<?php if (isset($user['avatar'])) echo  "../assets/pictures/$user[avatar]";
                            else echo "../assets/pictures/user.png"
                            ?>" alt="" height="45" width="45">
						</a>
					</li>
                  <?php endif;?>

				</ul>
			</div>
		  </div>
    </nav>
</header>
<script>
	const btnDropdown = document.querySelector('.btn-dropdown')
	const menu = document.querySelector('.my-dropdown-menu')

	const btnMobile = document.querySelector('.my-btn-mobile')
	const menuMobile = document.querySelector('.my-menu-mobile')
	let booleanMenu = false
	let booleanMenuMobile = false

	btnDropdown.addEventListener('click', (e) => {
		e.preventDefault()
		menu.style.display = !booleanMenu ? 'block' : "none"
		booleanMenu = !booleanMenu
	})

	btnMobile.addEventListener('click', (e) => {
		e.preventDefault()
		menuMobile.style.display = !booleanMenuMobile ? 'block' : "none"
		booleanMenuMobile = !booleanMenuMobile
	})


</script>
