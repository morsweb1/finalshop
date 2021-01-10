<?php
//
// Базовый контроллер сайта.
//

abstract class BaseController extends Controller {
  protected $title;		// заголовок страницы
  protected $content;		// содержание страницы
  protected $keyWords;


  protected function before() {

    $this->title = 'тест';
    $this->content = '';
    $this->keyWords="...";

  }

  //
  // Генерация базового шаблонаы
  //
  public function render() {

    $getUser = new User();

    if (isset($_SESSION['userId'])) {
      $user = $getUser->getUser($_SESSION['userId']);
    }

    $vars = array(
        'title' => $this->title,
        'content' => $this->content,
        'kw' => $this->keyWords,
        'user' => $user
    );

    $page = $this->Template('v/v_main.php', $vars);
    echo $page;
  }
}
