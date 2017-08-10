<?php
class MenuItem {
  public $id;
  public $url;
  public $name;

  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->url = $data['url'];
    $this->name = $data['name'];
  }

  public function getId() {
    return $this->id;
  }

  public function getUrl() {
    return $this->url;
  }

  public function getName() {
    return $ghis->name;
  }
}
