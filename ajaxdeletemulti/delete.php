<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "phpcrud");
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM user WHERE id = '".$id."'";
  mysqli_query($connect, $query);
 }
}
?>