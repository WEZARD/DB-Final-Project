<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','XXXXXX','Project');

$user_name = $_SESSION['user_name'];
$var_like = $_GET['para'];
$proid = $_GET['proid'];

if($var_like == 'unlike'){
	$unlike_query = "DELETE FROM `Like` where login_name = '$user_name' and proid = '$proid'";
	mysqli_query($dbc, $unlike_query);
	$home_url = "project-detail.php?proid=$proid";
    header('Location: '.$home_url);
}
	
else{
	$like_query = "INSERT INTO `Like` VALUES('$user_name','$proid')";
	mysqli_query($dbc, $like_query);
	//echo "<script>alert('Follow'); history.go(-2);</script>";
	$home_url = "project-detail.php?proid=$proid";
    header('Location: '.$home_url);
}

	


?>
