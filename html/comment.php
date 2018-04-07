<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');

$user_name = $_SESSION['user_name'];

$comment = $_POST['comment'];
$proid = $_GET['proid'];

date_default_timezone_set('America/New_York');
$localtime = date("Y-m-d H:i:s");

$comment_query = "INSERT INTO Comment VALUES('$user_name', $proid, '$comment', '$localtime')";
mysqli_query($dbc,$comment_query);


echo "<script>alert('Comment Successfully!'); window.location.href='project-detail.php?proid=";
echo $proid;
echo "'; </script>";



?>