<?php
function delete($table,$id)
{
    global $conn;
    $delete=$conn->prepare("delete from $table where id=:id");
    $delete->execute(["id"=>$id]);
    header("Location:index.php");
}
function getcategory($categoryId)
{
    global $conn;
    $str='';
    $categories=$conn->query("select * from categories");
    foreach($categories as $category)
    {
        $selected='';
        $id=$category['id'];
        $title=$category['title'];
        if($categoryId==$id)
            $selected='selected';
        $str .="<option $selected value='$id'>$title</option>";
    }
    return $str;
}
?>