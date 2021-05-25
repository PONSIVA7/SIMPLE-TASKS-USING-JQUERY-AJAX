<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Load JSON Data using Ajax getJSON Method</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:600px;">  
                <h3 align="">Load JSON Data using Ajax getJSON Method</h3><br />  
                <button class="btn btn-info">Load List of JSON Data</button>  
                <table class="table table-bordered" style="display:none;">  
                     <tr>  
                          <th>Video Title</th>  
                     </tr>  
                </table>  
           </div>  
           <br />  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $("button").click(function(){  
           $("table").show();  
           $.getJSON("video.json", function(data){  
                $.each(data, function(key, value){  
                     $("table").append("<tr><td>"+value.video_title+"</td></tr>");  
                });  
           });  
      });  
 });  
 </script>  