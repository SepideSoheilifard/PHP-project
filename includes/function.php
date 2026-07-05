<?php
  function getCategory($categoryId)
  {
    global $conn;
    $category=$conn->query("select * from categories where id=$categoryId")->fetch();
    return $category['title'];
  }

?>