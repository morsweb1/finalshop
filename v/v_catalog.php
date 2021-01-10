<?php
/*
 * Шаблон страницы каталога
 */
?>
<h1 class="cat-title">Каталог товаров</h1>
<div class="products-wrp">
		<?php if($goods):?>
			<?php foreach ($goods as $good):?>
				<div class="product">
					<a href="index.php?c=page&act=item&id=<?= $good['id']?>" class="img-link">
						<img src="images/products/<?= $good['image']?>" alt="<?= $good['name']?> photo" class="prod-img">
					</a>
					<span class="prod-name"><?= $good['name']?></span>
					<span class="short-desc"><?= $good['short_desc']?></span>
					<span class="price"><?= $good['price']?></span>
					<button class="prod-link btn" data-id="<?= $good['id']?>">В корзину</button>
				</div>
			<?php endforeach;?>
		<?php endif;?>
</div>