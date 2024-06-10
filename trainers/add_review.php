<?php 
include_once "../controllers/connect.php";
require_once "../content/header.php";
?>
<link rel="stylesheet" href="style.css">
<h1>Оставьте отзыв</h1>
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
	 <select name="coach" class="form-select" >
            <?php 
            $query="SELECT * FROM `coaches`";
            $run_out_prod=mysqli_query($conn, $query);
            while($option=mysqli_fetch_array($run_out_prod)){
                ?>
                <option value="<?=$option['id']?>"><?=$option['name']?> <?=$option['last_name']?></option>
           <?php }?>     


    </select>
	 <input type="submit" class="btn btn-secondary" value= "Отправить">
</form>