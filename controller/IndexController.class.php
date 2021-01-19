<?php

class IndexController extends Controller
{
    public $view = 'index';
    public $title;

    function __construct() {
        parent::__construct();
        $this->title .= ' BRAND';
    }
	
	//метод, который отправляет в представление информацию в виде переменной content_data
	function index($data) {
		 return "test";
	}

	function basket($data) {

    $this->title = 'Корзина';

    $goods = Basket::getGoods(isset($data['id']) ? $data['id'] : 0);

//    foreach ($goods as $good) {
//
//      $itemBasket = new Basket([
//        'id_good'=>$good['id_good']
//      ]);
//      return ['goods'=>$goods, 'item'=>$itemBasket->getGoodsInfo()[0]];
//    }


    return ['goods'=>$goods];
  }

	/*function test($id){

    }
*/

}

//site/index.php?path=index/test/5