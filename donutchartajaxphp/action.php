<?php
//action.php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["framework"]))
{
 $query = "
  INSERT INTO like_table(framework) VALUES('".$_POST["framework"]."')
 ";
 mysqli_query($connect, $query);
 $sub_query = "
   SELECT framework, count(*) as no_of_like FROM like_table 
   GROUP BY framework 
   ORDER BY id ASC";
 $result = mysqli_query($connect, $sub_query);
 $data = array();
 while($row = mysqli_fetch_array($result))
 {
  $data[] = array(
   'label'  => $row["framework"],
   'value'  => $row["no_of_like"]
  );
 }
 $data = json_encode($data);
 echo $data;
}
?>