<?php
/**
 * Шаблон личного кабинета
 */
foreach ($user as $u):
?>
<h1 class="title">Добро пожаловать! <?=$u['login']?></h1>
<h3 class="title title-form">Ваш email! <?=$u['email']?></h3>
<?php endforeach;?>
