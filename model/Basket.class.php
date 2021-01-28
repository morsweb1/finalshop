<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 29.09.2016
 * Time: 13:13
 */
class Basket extends Model {
    protected $id_user = NULL;
    protected $id_good;
    protected $name;
    protected $image;
    protected $price = 0;
    protected $is_in_order = 0;
    protected $id_order = NULL;
    protected $count = 1;

    function __construct(array $values = []) {
        parent::__construct($values);
    }

    public function setUser($id_user){
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $id_good
     */
    public function setIdGood($id_good) {
        $this->id_good = $id_good;
    }

  /**
   * @param mixed $name
   */
    public function setName($name) {
      $this->name = $name;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price) {
      $this->price = $price;
    }

  /**
   * @param mixed $image
   */
  public function setImage($image) {
    $this->image = $image;
  }

  /**
   * @param mixed $count
   */
    public function setCount($count) {
      $this->count = $count;
    }
    /**
     * @param int $is_in_order
     */
    public function setIsInOrder($is_in_order) {
        $this->is_in_order = $is_in_order;
    }

    /**
     * @param mixed $id_order
     */
    public function setIdOrder($id_order) {
        $this->id_order = $id_order;
    }

    public function save() {

      $query = "INSERT INTO basket (id_user, id_good, name, image, price, count) VALUES (
                  ".(($this->id_user==NULL) ? 0 : $this->id_user).", 
                  ".$this->id_good.", 
                  '".$this->name."',
                  '".$this->image."', 
                  ".$this->price.", 
                  ".$this->count."
                  )";

      db::getInstance()->Query($query);
    }

  public static function getGoods() {

    return db::getInstance()->Query(
      'SELECT * FROM basket ORDER BY id_basket DESC',
      ['status' => Status::Active]
    );
  }

  public static function getGoodBasket($id_good) {
    $result = db::getInstance()->Select(
            'SELECT * FROM basket WHERE id_good=:id_good',
            ['id_good' => $id_good]);
    return (isset($result[0]) ? $result[0] : null);
  }

  public static function getGoodCount($id_good) {
    $result = db::getInstance()->Select(
        'SELECT count FROM basket WHERE id_good=:id_good',
          ['id_good' => $id_good]
      );
    return (isset($result[0]) ? $result[0]['count'] : null);
  }

  public static function updateGood( $id_good, $count) {
      return db::getInstance()->Query(
          "UPDATE basket SET count = $count WHERE id_good=:id_good",
        ['id_good'=>$id_good]
      );
  }

  public function delete() {
      return db::getInstance()->Query(
        'DELETE FROM basket WHERE id_good=:id',
      ['id'=>$this->id_good]
      );
  }
}