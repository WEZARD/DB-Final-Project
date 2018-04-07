<?php
session_start();

if(isset($_SESSION['user_name'])){
  
  $user_name = $_SESSION['user_name'];
  if(isset($_POST['submit'])){
    $dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');

    $user_realname = mysqli_real_escape_string($dbc,trim($_POST['name']));
    $user_address = mysqli_real_escape_string($dbc,trim($_POST['address']));
    $user_phonenum = mysqli_real_escape_string($dbc,trim($_POST['phonenum']));
    $user_interests = mysqli_real_escape_string($dbc,trim($_POST['interests']));
    $user_card1 = mysqli_real_escape_string($dbc,trim($_POST['card1']));
    $user_card2 = mysqli_real_escape_string($dbc,trim($_POST['card2']));
  
    
    $query_info = "UPDATE User SET name = '$user_realname', address = '$user_address', phonenum = '$user_phonenum', interests = '$user_interests' WHERE login_name = '$user_name'";
    mysqli_query($dbc,$query_info);

    
    $card1 = $_SESSION['card1'];
    $card2 = $_SESSION['card2'];

    

    if(isset($_SESSION['card1'])){
        $query_card1 = "UPDATE Cards SET creditcard = '$user_card1' WHERE login_name = '$user_name' and creditcard = '$card1'";
        mysqli_query($dbc,$query_card1);
    }
    else{
        $query_card1 = "INSERT INTO Cards VALUES('$user_name','$user_card1')";
        mysqli_query($dbc,$query_card1);
    }



    if(isset($_SESSION['card2'])){
        $query_card2 = "UPDATE Cards SET creditcard = '$user_card2' WHERE login_name = '$user_name' and creditcard = '$card2'";
        mysqli_query($dbc,$query_card2);
    }
    else{
        $query_card2 = "INSERT INTO Cards VALUES('$user_name','$user_card2')";
        mysqli_query($dbc,$query_card2);
    }

    
    $_SESSION['user_realname'] = $user_realname;
    $_SESSION['user_address'] = $user_address;
    $_SESSION['user_phonenum'] = $user_phonenum;
    $_SESSION['user_interests'] = $user_interests;
    $_SESSION['card1'] = $user_card1;
    $_SESSION['card2'] = $user_card2;
    

    //$home_url = 'usercenter.php';
    //header('Location: '.$home_url);

    echo "<script>alert('Save!'); window.location.href='usercenter.php'; </script>";

}  

}

?>