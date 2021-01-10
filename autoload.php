<?php
require_once 'config/config.php';

spl_autoload_register('autoLoadClass');

function autoLoadClass($classname) {
  $dirs = ['c', 'm'];
  $found = false;

  foreach ($dirs as $dir) {
    $fileName = __DIR__.'/'.$dir.'/'.$classname.'.class.php';

    if (is_file($fileName)) {
      require_once ($fileName);
      $found = true;
    }
  }
  if (!$found) {
    throw new Exception('Загрузка не удалась'.$classname);
  }
  return true;
}