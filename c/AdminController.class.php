<?php

class AdminController extends BaseController {

  public function action_index () {
    $this->title = 'Admin';
    $this->content = $this->Template('v/admin/v_main.php', array('title'=>$this->title));
  }
}