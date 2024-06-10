<?php
global $connect, $user;
include_once '../controllers/connect.php';
require_once '../content/header.php';

// Check if the query is successful
$result = $connect->query("SELECT * FROM record WHERE busy = 1 AND id_trainer = $user[id]");
if (!$result) {
    die("Query failed: " . $connect->error);
}

$record = $result->fetch_all(MYSQLI_ASSOC);

// Check if the query is successful
$userIds = array_column($record, 'user_id');
if (!empty($userIds)) {
    $result = $connect->query("select * from users where id IN (". implode(',', $userIds). ")");
    if (!$result) {
        die("Query failed: ". $connect->error);
    }
    $client = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $client = array(); // or you can display a message saying no clients found
}
?>

<section class="container">
    <table class="table">
        <thead>
        <tr>
            <th>photo</th>
            <th>id</th>
            <th>name</th>
            <th>surname</th>
            <th>middle_name</th>
            <th>phone</th>
            <th>address</th>
            <th>time</th>
            <th>date</th>
            <th>updated_at</th>
            <th>Освободить запись</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($client as $item): ?>
            <tr>
                <td>
                <img class=""  src="../../assets/pictures/<?=$item['avatar']?>" alt="" height="65" width="65">
                </td>
                <td><?=$item["id"]?></td>
                <td><?=$item["name"]?></td>
                <td><?=$item["surname"]?></td>
                <td><?=$item["middle_name"]?></td>
                <td><?=$item["phone"]?></td>
                <td><?=$item["address"]?></td>
                <td><?=$record[0]["time"]?></td>
                <td><?=$record[0]["date"]?></td>
                <td><?=$record[0]["updated_at"]?></td>
                <td><a href="/trainer/controllers/del.php?record_id=<?=$record[0]["id"]?>">Освободить запись</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>