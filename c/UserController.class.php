<?php
//
// Конттроллер страницы чтения.
//
//include_once 'm/User.class.php';

class UserController extends BaseController {
  //
  // Конструктор.
  //

  public function action_account() {

    $getUser = new User();
    $user = $getUser->getUser($_SESSION['userId']);

    foreach ($user as $u) {
      $this->title = 'Личный кабинет - '. $u['login'];
    }
    $this->content = $this->Template('v/v_account.php', array('user'=>$user, 'title'=>$this->title));
  }

  public function action_reg() {
    $this->title = 'Регистрация';
    $this->content = $this->Template('v/v_reg.php', array('title'=>$this->title));

    if ($this->IsPost()) {
      $newUser = new User();
      $user = $newUser->newUser($_POST['name'], $_POST['email'], $_POST['pass']);
      $this->content = $this->Template('v/v_reg.php', array('user'=>$user, 'title'=>$this->title));
    }

  }

  public function action_login() {
    $this->title = 'Вход';
    $this->content = $this->Template('v/v_login.php', array('title'=>$this->title));

    if ($this->IsPost()) {
      $user = new User();
      $res = $user->login($_POST['name'], $_POST['pass']);
      $this->content = $this->Template('v/v_login.php', array('user'=>$res, 'title'=>$this->title));
    }
  }

  public function action_logout() {
    $logout = new User();
    $res = $logout->logout();
    header('location: index.php');
  }

}