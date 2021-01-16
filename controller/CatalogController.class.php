<?php
class CatalogController extends Controller {

  public $view = 'catalog';

  public function index($data){

    $this->title = 'Каталог товаров';

    $goods = Good::getGoods(isset($data['id']) ? $data['id'] : 0);

    return ['goods' => $goods];
  }

  public function item($data) {

    if($data['id'] > 0) {
      $good = new Good([
        "id_good" => $data['id']
      ]);

      return $good->getGoodInfo()[0];

    } else {
      header("Location: /categories/");
    }

  }
}