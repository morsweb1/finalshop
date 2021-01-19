<?php

class OrderController extends Controller {

  public function add($data) {
    $_GET['asAjax'] = true;

    $res = [
      'result' => 0
    ];

    if ($data['id'] > 0) {
      $id_good = $data['id'];
      $basket = new Basket();
      $basket->setIdGood($id_good);
      $basket->setName(Good::getGoodName($id_good));
      $basket->setImage(Good::getGoodImage($id_good));
      $basket->setPrice(Good::getGoodPrice($id_good));
      $basket->save();
      $res['result'] = 1;
    }
    return json_encode($res);
  }
}