<?php

class Review {

  public function getAllReviews () {
    $query = "SELECT * FROM comment ORDER BY data_creat DESC";
    $res = DB::getInstance()->Select($query);
    return $res;
  }

  public function newReview ($name, $text) {
    $params = [
      'name' => $name,
      'text' => $text
    ];
    $newReview = DB::getInstance()->Insert('comment', $params);
  }



//  public static function text_get() {
//    return file_get_contents('data/text.txt');
//  }
//
//  public static function text_set($text) {
//    file_put_contents('data/text.txt', $text);
//  }
}

