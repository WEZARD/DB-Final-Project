<?php
session_start();

//if(!isset($_SESSION['user_name'])){
  
  if(isset($_POST['submit'])){
    $dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
    $user_name = mysqli_real_escape_string($dbc,trim($_POST['login']));
    $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));
  
    
    if(!empty($user_name)){
      
      if(empty($user_password))
        echo "<script>alert('Please enter your password!'); history.go(－1);</script>";

      $query = "SELECT login_name FROM user WHERE  login_name = '$user_name'";
      $data = mysqli_query($dbc,$query);
      
      
      if(mysqli_num_rows($data)==1){
        $query_password = "SELECT password FROM User where login_name = '$user_name'";
        $var_password = mysqli_fetch_array(mysqli_query($dbc,$query_password));
        $db_password = $var_password['password'];
        if($user_password == $db_password)
        {
          $query_info = "SELECT * FROM user where login_name = '$user_name'";
          $_info = mysqli_fetch_array(mysqli_query($dbc,$query_info));

          $query_card = "SELECT * FROM Cards WHERE login_name = '$user_name'";
          $card = mysqli_query($dbc,$query_card);
          
          unset($_SESSION['card1']);
          unset($_SESSION['card2']);
          
          while($rows=mysqli_fetch_assoc($card)){

          if(!isset($_SESSION['card1']))
          $_SESSION['card1'] = $rows['creditcard'];
          
          else
          $_SESSION['card2'] = $rows['creditcard'];

          }
          

          $_SESSION['user_name'] = $user_name;
          $_SESSION['user_realname'] = $_info['name'];
          $_SESSION['user_address'] = $_info['address'];
          $_SESSION['user_phonenum'] = $_info['phonenum'];
          $_SESSION['user_interests'] = $_info['interests'];

          $home_url = 'index.php';
          header('Location: '.$home_url);

        }
        else
        echo "<script>alert('Invalid name or password!'); history.go(-1);</script>";
        
      }
      else{
        echo "<script>alert('Invalid name or password!'); history.go(-1);</script>";
        }
       
    
    }
    
    else
      echo "<script>alert('Please enter your name!'); history.go(-1);</script>";


}  

//}

?>