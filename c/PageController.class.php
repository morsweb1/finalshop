<?php

class PageController extends BaseController {
  //
  // нет конструктора в C_BASE, поэтому убрали конструктор из текущего класса
  //

  public function action_index() {
    $this->title = 'Главная';
    $this->content = $this->Template('v/v_index.php', array());
  }


  public function action_review() {
    $this->title = 'Отзывы';

    if ($this->IsPost()) {
      $newReview = new Review();
      $res = $newReview->newReview($_POST['name'], $_POST['text']);
    }

    $getReviews = new Review();
    $reviews = $getReviews->getAllReviews();

    $this->content = $this->Template('v/v_review.php', array('title'=>$this->title, 'reviews'=>$reviews));
  }

  public function action_catalog() {
    $this->title = 'Каталог';
    $getGoods = new Catalog();
    $goods = $getGoods->getGoods();

    $this->content = $this->Template('v/v_catalog.php', array('title'=>$this->title, 'goods'=>$goods));
  }

  public function action_item() {
    if ($this->IsGet()) {
      $item = new Catalog();
      $good = $item->getOneGood($_GET['id']);
    }
    foreach ($good as $item) {
      $this->title = $item['name'];
    }
    $this->content = $this->Template('v/v_item.php', array('title'=>$this->title, 'good'=>$good));
  }
}
