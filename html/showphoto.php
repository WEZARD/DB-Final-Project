<?php  
// 连接数据库  
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
$proid = $_GET['para'];
$id = $_GET['id'];

$query2 = "SELECT *  FROM `Update` WHERE id = $id";
$thread = mysqli_fetch_array(mysqli_query($dbc,$query2));

header('content-type:'.$thread['type']);  
echo $thread['binarydata'];  

?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">  
<html>  
 <head>  
  <meta http-equiv="content-type" content="text/html; charset=utf-8">  
  <title> upload image to db demo </title>  
 </head>  
  
 <body>   
  
 </body>  
</html>  