<?php

class ReviewController extends Controller {

  public $view = 'review';

  public function index($data) {

    $this->title = 'Отзывы';

    $reviews = Review::getReviews(isset($data['id']) ?$data['id'] : 0);

    return ['reviews'=>$reviews];

  }

}