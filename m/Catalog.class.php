<?php

class Catalog {

  public function getGoods () {
    $query = "SELECT * FROM catalog ORDER BY id DESC";
    $res = DB::getInstance()->Select($query);
    return $res;
  }

  public function getOneGood ($id) {
    $query = "SELECT * FROM catalog WHERE id='$id'";
    $res = DB::getInstance()->Select($query);
    return $res;
  }
}