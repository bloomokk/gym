<?php
global $connect, $user;
require_once '../controllers/connect.php';
require_once '../content/header.php';
$users = $connect->query('select * from users ');
?>

<div class="container">
<h1>Список пользователей</h1>

<section>
    <table class='table container'>
    <thead>
        <tr>
            <th>аватар</th>
            <th>id</th>
            <th>Роль</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th>День рождения</th>
            <th>Пароль</th>
            <th>Зарегистрирован</th>
            <th>Изменен</th>
            <th>Редактировать</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $use):?>
        <tr>
            <td><img src="../assets/pictures/<?=$use["avatar"]?>" alt="" height="80" width="80" class="rounded-circle"></td>
            <td><?=$use["id"]?></td>
            <td><?=$use["name"]?></td>
            <td><?=$use["surename"]?></td>
            <td><?=$use["middle_name"]?></td>
            <td><?=$use["phone"]?></td>
            <td><?=$use["address"]?></td>
            <td><?=$use["birthday"]?></td>
            <td><?=$use["password"]?></td>
            <td><?=$use["created_at"]?></td>
            <td><?=$use["updated_at"]?></td>
            <td><a href='update_users.php?id_user=<?=$use["id"]?>'>Изменить</a></td>
            <td><a href='controllers/users/del.php?del_user_id=<?=$use["id"]?>'>Удалить</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
    </table>
</section>