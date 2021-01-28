<?php

class BasketController extends Controller {

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

        $res['result'] = 1;

      } else {

        if (isset($_SESSION['userId'])) {
          $basket = new Basket();
          $basket->setUser($_SESSION['userId']);
          $basket->setIdGood($data['id']);
          $basket->setName(Good::getGoodName($data['id']));
          $basket->setImage(Good::getGoodImage($data['id']));
          $basket->setPrice(Good::getGoodPrice($data['id']));
          $basket->save();

          $res['result'] = 1;
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
    }

    return json_encode($res);
  }

  public function delete($data) {
    $_GET['delGood'] = true;

    $res = [
      'result' => 0
    ];

    if ($data['id'] > 0) {

      $item = new Basket();
      $item->setIdGood($data['id']);
      $item->delete();

      $res['result'] = 5;

    }
    return json_encode($res);
  }

//  public function changeBasket($data) {
//    $_GET['delGood'] = true;
//
//    $res = [
//      'result' => 0
//    ];
//
//    if ($data['id'] > 0) {
//      $item = Basket::getGoodBasket($data['id']);
//      if ($item['count'] > 1) {
//
//      }
//    }
//  }
}