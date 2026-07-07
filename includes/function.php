<?php
function getCategory($categoryId)
{
  global $conn;
  $category=$conn->query("select * from categories where id=$categoryId")->fetch();
  return $category['title'];
}
function countComment($postId)
{
  global $conn;
  $count=$conn->query("select * from comments where post_id=$postId and status=1 ")->rowCount();
  return $count;
}
?>