<?php

class User {

  protected $userId, $userName, $userEmail, $userPass;

  private function setPass($name, $pass) {
    return strrev(md5($name).md5($pass));
  }

  public function getUser ($id) {
    $query = "SELECT * FROM users WHERE id='$id'";
    $res = DB::getInstance()->Select($query);
    return $res;
  }

  public function newUser ($name, $email, $pass) {

    $query = "SELECT * FROM users WHERE login = '$name'";
    $getUser = DB::getInstance()->Select($query);

    if (!$getUser) {
      $params = [
        'login' => $name,
        'email' => $email,
        'password' => $this->setPass($name, $pass)
      ];
      $newUser = DB::getInstance()->Insert('users', $params);
      if (is_numeric($newUser) AND filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return '<h3 class="title title-form">Регистрация прошла успешно!</h3>';
      }
      return '<h3 class="title title-form">Ошибка!!!</h3>';
    }
    return '<h3 class="title title-form">Пользователь такой есть!</h3>';
  }

  public function login ($name, $pass) {

    $query = "SELECT * FROM users WHERE login = '$name'";
    $user = DB::getInstance()->Select($query);
    if ($user) {
      foreach ($user as $u) {
        if($u['password'] == $this->setPass($name, $pass)) {
          $_SESSION['userId'] = $u['id'];
          return '<h3 class="title title-form">Добро пожаловать! ' . $u['login'].'</h3>';
        }
        return '<h3 class="title title-form">Не правильно ввели пароль!</h3>';
      }

    }
    return '<h3 class="title title-form">Нет такого пользователя!</h3>';
  }

  public function logout () {
    if (isset($_SESSION['userId'])) {
      session_destroy();
      return true;
    }
    return false;
  }
}