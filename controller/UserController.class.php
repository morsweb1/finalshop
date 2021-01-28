<?php

class UserController extends Controller {



  public function logout($data) {
    $logout = new User([]);
    $logout->logout();
    header('location: index.php');
    return true;
  }



}