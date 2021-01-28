<?php

class IndexController extends Controller {
    public $view = 'index';
    public $title;

    function __construct() {
        parent::__construct();
        $this->title .= ' BRAND';
    }

	//метод, который отправляет в представление информацию в виде переменной content_data
	function index($data) {

//    $user = $data['user'];
//
//		return ['user'=>$user];
	}

	function basket($data) {

    $this->title = 'Корзина';

    $goods = Basket::getGoods(isset($data['id']) ? $data['id'] : 0);

    return ['goods'=>$goods];
  }

  function registration($data) {
    $this->title = 'Регистриция';

    if ($this->IsPost()) {

      $newUser = User::newUser($_POST['name'], $_POST['email'], $_POST['pass']);
    }
    return ['user'=>$newUser];
  }

  function login($data) {
    $this->title = 'Вход';

    if ($this->IsPost()) {
      $user = User::login($_POST['name'], $_POST['pass']);
    }
    return ['user'=>$user];
  }

  public function account($data) {
    $this->title = 'Личный кабинет';

    $user = new User([]);
    $user->getUser($_SESSION['userId']);
    return ['user'=>$user];
  }
}

//site/index.php?path=index/test/5