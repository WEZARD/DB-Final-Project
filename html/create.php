<?php
session_start();
  
  if(isset($_POST['submit'])){
    $dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
    
    $project_name = mysqli_real_escape_string($dbc,trim($_POST['pname']));
    $project_description = mysqli_real_escape_string($dbc,trim($_POST['pdescription']));
    $project_category = mysqli_real_escape_string($dbc,trim($_POST['pcategory']));
    $project_loginname = $_SESSION['user_name'];
    $project_maxfunds = mysqli_real_escape_string($dbc,trim($_POST['pmaxfunds']));
    $project_minfunds = mysqli_real_escape_string($dbc,trim($_POST['pminfunds']));
    $project_endtime = mysqli_real_escape_string($dbc,trim($_POST['pendtime']));
    $project_plantime = mysqli_real_escape_string($dbc,trim($_POST['pplantime']));
    
    date_default_timezone_set('America/New_York');
    $posttime = date("Y-m-d H:i:s");

    $query1 = "SELECT proname FROM Projects ";
    $data1 = mysqli_query($dbc,$query1);
    $pnum = mysqli_num_rows($data1) + 1;

       $query_reg = "INSERT INTO Projects VALUES('$pnum','$project_name','$project_description',NULL,'$project_category','$project_loginname','$project_minfunds','$project_maxfunds','0','$posttime','$project_endtime','$project_plantime','funding',NULL)";
          mysqli_query($dbc,$query_reg);

          $home_url = 'usercenter-project.php';
          header('Location: '.$home_url);

}


?>