<?php  

$proid = $_GET['para'];

?>  
<!DOCTYPE html>
<html>  
 <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" > 
  <title> upload image to db demo </title>  
 </head>  
  
 <body>  
  <form name="form1" method="post" action="upload.php?para=<?echo $proid;?>" enctype="multipart/form-data">  
  <p>Upload：<input type="file" name="photo"></p>  
  <p><input type="hidden" name="action" value="add"><input type="submit" name="b1" value="Submit"></p>  
  </form>  

  
 </body>  
</html>  
