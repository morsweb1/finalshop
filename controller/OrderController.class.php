<?php

class OrderController extends Controller {

  public function add($data) {
    $_GET['asAjax'] = true;

    $res = [
      'result' => 0
    ];

    if ($data['id'] > 0) {

      $item = Basket::getGoodBasket($data['id']);

      if (isset($item)) {

        $count = $item['count'];
        $count++;
        $item = Basket::updateGood($data['id'], $count);

        $res['result'] = 2;

      } else {

        $basket = new Basket();
        $basket->setIdGood($data['id']);
        $basket->setName(Good::getGoodName($data['id']));
        $basket->setImage(Good::getGoodImage($data['id']));
        $basket->setPrice(Good::getGoodPrice($data['id']));
        $basket->save();

        $res['result'] = 1;
      }

    }

    return json_encode($res);
  }
}