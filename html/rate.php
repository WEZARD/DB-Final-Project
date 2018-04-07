<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');

$user_name = $_SESSION['user_name'];
$rate = $_POST['rate'];
$proid = $_GET['proid'];

$rate_query = "INSERT INTO Rate VALUES('$user_name', $proid, $rate)";
mysqli_query($dbc,$rate_query);

$rating_query = "SELECT AVG(rating) as num FROM Rate WHERE proid = $proid";
$rating = mysqli_fetch_array(mysqli_query($dbc,$rating_query));
$avg_rating = $rating["num"];

$update_rating = "UPDATE Projects SET rating = $avg_rating WHERE proid = $proid";
mysqli_query($dbc,$update_rating);


echo "<script>alert('Thanks for your rate!'); window.location.href='project-detail.php?proid=";
echo $proid;
echo "'; </script>";


?>