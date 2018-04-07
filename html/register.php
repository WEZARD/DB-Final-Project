<?php
session_start();

//if(!isset($_SESSION['user_name'])){
  
  if(isset($_POST['submit'])){
    $dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
    $user_name = mysqli_real_escape_string($dbc,trim($_POST['login']));
    $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));
  
    if(!empty($user_name)){
      $query = "SELECT login_name FROM User WHERE  login_name = '$user_name'";
      $data = mysqli_query($dbc,$query);
      
      if(mysqli_num_rows($data)==1){
        echo "<script>alert('$user_name has been registered'); history.go(-1);</script>";
      }
      else{
        if(!empty($user_password))
        {
          $query_reg = "INSERT INTO User VALUES('$user_name','$user_password','','','','')";
          mysqli_query($dbc,$query_reg);

          
          
          $_SESSION['user_name'] = $user_name;

          $home_url = 'index.php';
          header('Location: '.$home_url);
        }
        else
          echo 'Sorry, you must enter a valid password to log in.';
      }
    
    }
    
    else{
      echo 'Sorry, you must enter a valid name to log in.';
    }

}  

//}


?>