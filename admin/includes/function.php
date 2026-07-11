<?php
function delete($table,$id)
{
    global $conn;
    $delete=$conn->prepare("delete from $table where id=:id");
    $delete->execute(["id"=>$id]);
    header("Location:index.php");
}
?>