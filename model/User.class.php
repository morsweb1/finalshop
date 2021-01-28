<?php

class User extends Model {

//  protected static $table;
//  protected static function setProperties() {
//    self::$properties['id_user'] = [
//      'type' => 'int'
//    ];
//  }
//  public function __construct(array $values) {
//    parent::__construct($values);
//  }

  /**
   * @param $name
   * @param $pass
   * @return string
   */
  private static function setPass($name, $pass) {
    return strrev(md5($name).md5($pass));
  }

  public static function newUser($name, $email, $pass) {

    $user = db::getInstance()->Select(
      'SELECT * FROM users WHERE email=:email AND password=:pass',
      ['email'=>$email, 'pass'=> self::setPass($name, $pass)]
    );

    if (!$user) {
      $emailUser = filter_var($email, FILTER_VALIDATE_EMAIL);
      if ($emailUser) {
        $newUser = db::getInstance()->Query(
          'INSERT INTO users (login, email, password) VALUES (:name, :email, :pass)',
          ['name' => $name, 'email' => $emailUser, 'pass' => self::setPass($name, $pass)]
        );
        return 'Регистрация прошла успешно!';
      }
      return 'Не правильно ввели Email !!!';
    }
    return 'Пользователь такой есть!';
  }

  public static function login($name, $pass){

    $user = db::getInstance()->Select(
      'SELECT * FROM users WHERE login=:name AND password=:pass',
      ['name'=>$name, 'pass'=>self::setPass($name, $pass)]
    );

    if ($user) {
      foreach ($user as $u) {
        if($u['password'] == self::setPass($name, $pass)) {
          $_SESSION['userId'] = $u['id'];
          return 'Добро пожаловать - ' . $u['login'].'!';
        }
        return 'Не правильно ввели пароль!';
      }
    }
    return 'Нет такого пользователя!';
  }

  public function getUser($id){
    if (isset($_SESSION['userId'])) {
      $user = db::getInstance()->Select(
        'SELECT * FROM users WHERE id = :id_user',
        ['id_user'=>$id]
      );
      return (isset($user[0]) ? $user[0] : null);
    }
    return [];
  }

  public function logout() {
    if (isset($_SESSION['userId'])) {
      session_destroy();
      return true;
    }
    return false;
  }
}