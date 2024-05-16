<?php
global $connect;
if (isset($_SESSION['user_id'])) $user = $connect->query("select * from users where id='$_SESSION[user_id]'")->fetch_array();
$cat=$connect->query("select * from category")
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
		@media (max-width: 1000px) {
			display: none;
        }
	}
	.menu-modal {
        display: none;
        @media (max-width: 1000px) {
            display: block;
        }
	}
</style>
<header>
    <nav class="navbar navbar-expand bg-black">
        <div class="container">
            <a class="navbar-brand" href="/index.php">
                <img src="../assets/pictures/logo.png" alt="logo" height="65">
            </a>
			<div class="justify-content-end fs-5 collapse navbar-collapse" >
				<ul class="navbar-nav menu-desktop" style="align-items: center">
					<li class="nav-item"><a href="/" class="nav-link text-white">Главная</a></li>
					<li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Услуги</a></li>
                    <li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Спортпит</a></li>
                    <li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Отзывы</a></li>
                    <li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">О нас</a></li>
                    <li class="nav-item"><a class="nav-link text-white link-hover-class" href="/product/index.php">Контакты</a></li>
                  <?php if(empty($_SESSION['user_id'])):?>
							  <li class="nav-item"><a href="/login/index.php" class="nav-link text-white">Вход</a></li>
							  <li class="nav-item"><a href="/registration/index.php" class="nav-link text-white">Регистрация</a></li>
                  <?php endif;?>
                  <?php if (isset($user) and $user['roly_id'] == 1):?>
					  <li class="nav-item"><a href="/admin/index.php" class="nav-link text-white link-hover-class">Админ панель</a></li>
                  <?php endif;?>
                  <?php if(isset($_SESSION['user_id'])):?>
					  <li class="nav-item">
						  <a href="/user/index.php" class="nav-link text-white d-flex gap-3 link-hover-class" style="align-items: center">
							  <p style="margin-top: 16px;"><?=$user['login']?></p>
							  <img class="rounded-circle"  src="<?php if (isset($user['avatar'])) echo  "../assets/img/user/$user[avatar]";
                              else echo "../assets/pictures/user.jpg"
                              ?>" alt="" height="45" width="45">
						  </a>
					  </li>
                  <?php endif;?>
				</ul>
				<ul class="navbar-nav menu-modal " >
					<li class="nav-item dropdown ">
						<a class="nav-link my-btn-mobile text-white">
							Меню
						</a>
						<ul class="my-menu-mobile navbar-nav  bg-white rounded-2 p-4" style="z-index: 1; display: none; position: absolute">
							<li class="nav-item"><a href="/" class="nav-link ">Главная</a></li>
							<li class="nav-item"><a class="nav-link  link-hover-class" href="/product/index.php">Одежда</a></li>
							<li class="nav-item my-dropdown ">
								Категории:
									<ul class="my-dropdown-menu bg-white rounded-2 p-4" >
                                      <?php foreach ($cat as $category):?>
										  <li class="nav-item border-bottom"><a class="dropdown-item link-hover-class" href="/product/index.php?category_id=<?=$category['id']?>"><?=$category['name']?></a></li>
                                      <?php endforeach;?>
									</ul>

							</li>
                          <?php if(empty($_SESSION['user_id'])):?>
							  <li class="nav-item"><a href="/login/index.php" class="nav-link">Вход</a></li>
							  <li class="nav-item"><a href="/registration/index.php" class="nav-link ">Регистрация</a></li>
                          <?php endif;?>
							<li class="nav-item"><a href="/basket/index.php" class="nav-link link-hover-class">Корзина</a></li>
                          <?php if ($user['roly_id'] == 1):?>
							  <li class="nav-item"><a href="/admin/index.php" class="nav-link link-hover-class">Админ панель</a></li>
                          <?php endif;?>

						</ul>
					</li>
                      <?php if(isset($_SESSION['user_id'])):?>
					<li class="nav-item">
						<a href="/user/" class="nav-link text-white d-flex gap-3 link-hover-class" style="align-items: center">
							<p style="margin-top: 16px;"><?=$user['login']?></p>
							<img class="rounded-circle"  src="<?php if (isset($user['avatar'])) echo  "../assets/img/user/$user[avatar]";
                            else echo "../assets/img/user.jpg"
                            ?>" alt="" height="45" width="45">
						</a>
					</li>
                  <?php endif;?>

				</ul>
			</div>
		  </div>
    </nav>
</header>
