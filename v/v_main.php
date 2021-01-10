<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />

  <title><?=$title?></title>
</head>
<body>
<header class="header">
	<?php include_once 'v_header.php' ?>
</header>
	<main>
		<?=$content?>
	</main>
<footer>
	<?php include_once 'v_footer.php' ?>
</footer>
<script src="../js/app.js"></script>
</body>
</html>
