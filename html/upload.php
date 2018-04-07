<?php  
session_start();
 
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
 
$action = isset($_REQUEST['action'])? $_REQUEST['action'] : '';  
  
 
if($action=='add'){  
  
    $image = mysqli_real_escape_string($dbc,file_get_contents($_FILES['photo']['tmp_name']));  
    
    $type = $_FILES['photo']['type']; 
    
    date_default_timezone_set('America/New_York');
    $utime = date("Y-m-d H:i:s"); 
    
    $proid = $_GET['para'];
    

    $sqlstr = "INSERT INTO `Update`(proid,utime,type,binarydata) VALUES('$proid','$utime','".$type."','".$image."')";  
    mysqli_query($dbc,$sqlstr); 
  
    $home_url = "project-detail.php?proid=$proid";
    header('Location: '.$home_url);  
  
 
}

?>