<?php

require_once 'autoload.php';

//site.ru/index.php?act=auth&c=User

$action = 'action_';
$action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';

switch ($_GET['c']) {
  case 'articles':
    $controller = new PageController();
    break;
  case 'user':
    $controller = new UserController();
    break;
  case 'admin':
    $controller = new AdminController();
    break;
  default:
    $controller = new PageController();
}

$controller->Request($action);