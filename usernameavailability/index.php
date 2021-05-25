
<html>  
 <head>  
  <title>Check Username Availability </title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <style>  
  body  
  {  
   margin:0;  
   padding:0;  
   background-color:#f1f1f1;  
  }  
  .box  
  {  
   width:800px;  
   border:1px solid #ccc;  
   background-color:#fff;  
   border-radius:5px;
   margin-top:36px;  
  }  
  </style>  
 </head>  
 <body>  
  <div class="container box">  
   <div class="form-group">  
    <h3 align="center">Check Username Availability </h3><br />  
    <label>Enter Username</label>  
    <input type="text" name="username" id="username" class="form-control" />
    <span id="availability"></span>
    <br /><br />
    <button type="button" name="register" class="btn btn-info" id="register" disabled>Register</button>
    <br />
   </div>  
   <br />  
   <br />  
  </div>  
 </body>  
</html>  
<script>  
 $(document).ready(function(){  
   $('#username').blur(function(){

     var username = $(this).val();

     $.ajax({
      url:'check.php',
      method:"POST",
      data:{user_name:username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Username not available</span>');
        $('#register').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Username Available</span>');
        $('#register').attr("disabled", false);
       }
      }
     })

  });
 });  
</script>
