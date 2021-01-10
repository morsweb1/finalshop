<div class="header-wrp">
  <div class="logo-wrp">
    <div class="logo"></div>
    <div class="logo-name">Brand</div>
  </div>
  <div class="menu-wrp">
    <ul class="menu">
				<a class="menu-link" href="index.php">Главная</a>
				<a class="menu-link" href="index.php?c=page&act=review">Отзывы</a>
				<a class="menu-link" href="index.php?c=page&act=catalog">каталог</a>
      <?php if (!$user):?>
				<a class="menu-link" href="index.php?c=user&act=reg">Регистрация</a>
				<a class="menu-link" href="index.php?c=user&act=login">Войти</a>
      <?php else:?>
				<a class="menu-link" href="index.php?c=user&act=account">Личный кабинет</a>
				<a class="menu-link" href="index.php?c=user&act=logout">Выйти</a>
      <?php endif;?>
			<a href="#"><i class="fas fa-shopping-basket"></i></a>
    </ul>
  </div>
</div>