<?php
class MenuMapper extends Mapper {

  public function getMenu($menu_id) {
    $sql = "select id, url, name from asarum.menu_item";
    $stmt = $this->db->query($sql);
    $result=[];
    while($row=$stmt->fetch()) {
      $result[] = new MenuItem($row);
    }

    return $result;
  }
}
