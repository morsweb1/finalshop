<?php

class Controller {
    public $view = 'admin';
    public $title;

    function __construct() {
        $this->title = Config::get('sitename');
    }

    public function index($data) {
        return [];
    }

  //
  // Запрос произведен методом GET?
  //
  protected function IsGet() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

  //
  // Запрос произведен методом POST?
  //
  protected function IsPost() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

}