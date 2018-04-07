<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');

$user_name = $_SESSION['user_name'];

$card = $_POST['card'];
$money = $_GET['money'];
$proid = $_GET['proid'];

date_default_timezone_set('America/New_York');
$localtime = date("Y-m-d H:i:s");

$pledge_query = "INSERT INTO Record VALUES('$user_name', $proid, $money, '$card', '$localtime', 'pending', NULL)";
mysqli_query($dbc,$pledge_query);

$fund_query = "UPDATE Projects SET realfunds = realfunds + $money WHERE proid = $proid";
mysqli_query($dbc,$fund_query);


$project_query = "SELECT * FROM Projects WHERE proid = $proid";
$project = mysqli_fetch_array(mysqli_query($dbc,$project_query));


if($project["realfunds"] == $project["maxfunds"]){
	$ongoing_query = "UPDATE Projects SET status = 'ongoing' WHERE proid = $proid";
	mysqli_query($dbc,$ongoing_query);

	$charge_query = "UPDATE Record SET status = 'charged', chargetime = '$localtime' WHERE proid = $proid";
	mysqli_query($dbc,$charge_query);

}



echo "<script>alert('Thanks for your pledge!'); window.location.href='project-detail.php?proid=";
echo $proid;
echo "'; </script>";


?>