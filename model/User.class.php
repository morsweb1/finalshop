<?php

class User extends Model {

  /**
   * @param $name
   * @param $pass
   * @return string
   */
//  public function setPass($name, $pass) {
//    return $this->password = strrev(md5($name).md5($pass));
//  }

  public static function newUser($name, $email, $pass) {


    $password = strrev(md5($name).md5($pass));

    $user = db::getInstance()->Select(
      'SELECT * FROM users WHERE email=:email AND password=:pass',
      ['email'=>$email, 'pass'=>$password]
    );

    if (!$user) {
      $emailUser = filter_var($email, FILTER_VALIDATE_EMAIL);
      if ($emailUser) {
        $newUser = db::getInstance()->Query(
          'INSERT INTO users (login, email, password) VALUES (:name, :email, :pass)',
          ['name' => $name, 'email' => $emailUser, 'pass' => $password]
        );
        return 'Регистрация прошла успешно!';
      }
      return 'Не правильно ввели Email !!!';
    }
    return 'Пользователь такой есть!';
  }
}