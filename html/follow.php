<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','XXXXXX','Project');

$user_name = $_SESSION['user_name'];
$var_follow = $_GET['para'];
$login_name2 = $_GET['para2'];
$proid = $_GET['proid'];

if($var_follow == 'unfollow'){
	$unfollow_query = "DELETE FROM Follow where login_name1 = '$user_name' and login_name2 = '$login_name2'";
	mysqli_query($dbc, $unfollow_query);
	//echo "<script>alert('Follow'); history.go(-2);</script>";
	$home_url = "project-detail.php?proid=$proid";
    header('Location: '.$home_url);
}
	
else{
	$follow_query = "INSERT INTO Follow VALUES('$user_name','$login_name2')";
	mysqli_query($dbc, $follow_query);
	//echo "<script>alert('Follow'); history.go(-2);</script>";
	$home_url = "project-detail.php?proid=$proid";
    header('Location: '.$home_url);
}

	


?>
