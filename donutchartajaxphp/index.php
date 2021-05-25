<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "testing");
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
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Live Donut Chart with Ajax PHP</title>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Live Donut Chart with Ajax PHP</h2>
   <form method="post" id="like_form">
    <div class="form-group">
     <label>Like Any one PHP Framework</label>
     <div class="radio">
      <label><input type="radio" name="framework" value="Codeigniter" /> Codeigniter</label>
     </div>
     <div class="radio">
      <label><input type="radio" name="framework" value="Laravel" /> Laravel</label>
     </div>
     <div class="radio">
      <label><input type="radio" name="framework" value="Symfony" /> Symfony</label>
     </div>
     <div class="radio">
      <label><input type="radio" name="framework" value="Yii" /> Yii</label>
     </div>
     <div class="radio">
      <label><input type="radio" name="framework" value="CakePHP" /> CakePHP</label>
     </div>
    </div>
    <div class="form-group">
     <input type="submit" name="like" class="btn btn-info" value="Like" />
    </div>
   </form>
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 
 var donut_chart = Morris.Donut({
     element: 'chart',
     data: <?php echo $data; ?>
    });
  
 $('#like_form').on('submit', function(event){
  event.preventDefault();
  var checked = $('input[name=framework]:checked', '#like_form').val();
  if(checked == undefined)
  {
   alert("Please Like any Framework");
   return false;
  }
  else
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"action.php",
    method:"POST",
    data:form_data,
    dataType:"json",
    success:function(data)
    {
     $('#like_form')[0].reset();
     donut_chart.setData(data);
    }
   });
  }
 });
});

</script>
