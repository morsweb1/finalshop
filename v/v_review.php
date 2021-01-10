<?php
/*
 * Шаблон страницы отзывов
 */
?>
<h3 class="title title-form"><?=$title?></h3>
<div class="reviews-wrp">
  <?php if($reviews):?>
    <?php foreach($reviews as $review):?>
			<div class="reviews">
				<div class="author-wrp">
					<p class="reviews-name"><?=$review['name']?>
					<p class="reviews-date"><?=$review['data_creat']?></p>
				</div>
				<p class="reviews-txt"><?=$review['text']?></p>
			</div>
    <?php endforeach;?>
  <?php endif;?>
</div>
<div class="form-wrp">
	<form class="form" method="post">
		<input type="text" name="name" placeholder="Ваше имя" required>
		<textarea name="text" cols="30" rows="10" placeholder="Оставьте ваш отзыв" required></textarea>
		<button class="form-btn btn" type="submit" name="add">Оставить отзыв</button>
	</form>
</div>
