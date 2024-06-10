<?php
global $connect;
include_once '../controllers/connect.php';
require_once '../content/header.php';

$id_trainer=$_GET['id_trainer'];
$trainers = $connect->query("SELECT * FROM `users` WHERE `id`=$id_trainer")->fetch_array();
$price = $connect->query("select * from price where id_trainer = $id_trainer");
$record = $connect->query("select user_id from `record` WHERE `id_trainer` = $id_trainer and user_id = $user[id]");
?>
<main>
    <div class="container">
        <div class="flex-column d-flex mx-auto my-4 card mx-auto p-3"  style="max-width: 600px">
            <img class="mx-auto" style="max-width: 500px" src="/assets/pictures/<?=$trainers['avatar']?>" alt="">
            <div class="d-flex flex-column gap-3 my-4 fs-4">
                <div>
                <p class="h2 text-center">ФИО: <?php echo ($trainers['name'] . ' ' . $trainers['surname'] . ' ' . $trainers['middle_name']); ?></p></div>
                <div>Цена: <?=$price['price']?></div>
                <a class="btn btn-primary" href='./record_trainer.php?id_trainer=<?=$trainers['id']?>'>Записаться</a>
                <a href="rev.php?coach_id=<?=$option['id']?>" class="btn btn-secondary">Посмотреть отзывы</a>
                <?php if(isset($_SESSION['user_id'])):?>
                    <?php if ($record->num_rows > 0):?>
                        <button class="btn btn-secondary" id="show-form-btn">Оставить отзыв</button>
                <div id="form-container" style="display: none;">
                <form method="post" action="add_rev_coach.php">
                    <label>Ваша оценка</label>
                    <div class="rating-area">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"></label>
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    <label>Отзыв</label>
                    <textarea name="text" class="form-control" name="text"> </textarea>
                    <input type="hidden" name="coach" value="<?=$id_trainer?>">
                    <input type="submit" class="btn btn-secondary" value= "Отправить">
                </form>
                </div>
                    <?php endif;?>   
                <?php endif;?>
            </div>
        </div>
    </div>
</main>
<?php
unset($_SESSION['error_basket']);
?>
<script>
    document.getElementById('show-form-btn').addEventListener('click', function() {
  var formContainer = document.getElementById('form-container');
  if (formContainer.style.display === 'block') {
    formContainer.style.display = 'none';
  } else {
    formContainer.style.display = 'block';
  }
});
</script>
<style>
.rating-area {
	overflow: hidden;
	margin: 0 auto;
}
.rating-area:not(:checked) > input {
	display: none;
}
.rating-area:not(:checked) > label {
	float: right;
	width: 42px;
	padding: 0;
	cursor: pointer;
	font-size: 32px;
	line-height: 32px;
	color: lightgrey;
	text-shadow: 1px 1px #bbb;
}
.rating-area:not(:checked) > label:before {
	content: '★';
}
.rating-area > input:checked ~ label {
	color: gold;
	text-shadow: 1px 1px #c60;
}
.rating-area:not(:checked) > label:hover,
.rating-area:not(:checked) > label:hover ~ label {
	color: gold;
}
.rating-area > input:checked + label:hover,
.rating-area > input:checked + label:hover ~ label,
.rating-area > input:checked ~ label:hover,
.rating-area > input:checked ~ label:hover ~ label,
.rating-area > label:hover ~ input:checked ~ label {
	color: gold;
	text-shadow: 1px 1px goldenrod;
}
.rate-area > label:active {
	position: relative;
}
 
.rating-result {
	width: 265px;
	margin: 0 auto;
}
.rating-result span {
	padding: 0;
	font-size: 32px;
	margin: 0 3px;
	line-height: 1;
	color: lightgrey;
	text-shadow: 1px 1px #bbb;
}
.rating-result > span:before {
	content: '★';
}
.rating-result > span.active {
	color: gold;
	text-shadow: 1px 1px #c60;
}
.rating-mini {
	display: inline-block;
	font-size: 0;
}
.rating-mini span {
	padding: 0;
	font-size: 20px;
	line-height: 1;
	color: lightgrey;
}
.rating-mini > span:before {
	content: '★';
}
.rating-mini > span.active {
	color: gold;
}
form {
	display: flex;
	flex-direction: column;
    align-items: center;
}</style>