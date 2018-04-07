<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');

$user_name = $_SESSION['user_name'];

$money = $_POST['pledge'];
$proid = $_GET['proid'];


?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment</title>
</head>

<body>
<form name="form1" method="post" action="cardconfirm.php?proid=<?echo $proid;?>&money=<?echo $money;?>"> 
<table width=‘80%' border=1 align='center' cellpadding=5 cellspacing=0>
<tr><td>Your Card</td><td>checkbox</td></tr>

<?php

	if(!isset($_SESSION['card1']))
	echo "<script>alert('Link a card first!'); window.location.href='usercenter.php'; </script>";	

	if(isset($_SESSION['card1'])){
		echo'<tr><td>';
		echo $_SESSION['card1'];
		echo'</td><td><INPUT TYPE="radio" NAME="card" VALUE="';
		echo $_SESSION['card1'];
		echo'""></td></tr>';

	}

	if(isset($_SESSION['card2'])){
		echo'<tr><td>';
		echo $_SESSION['card2'];
		echo'</td><td><INPUT TYPE="radio" NAME="card" VALUE="';
		echo $_SESSION['card2'];
		echo'""></td></tr>';

	}
    

  
?>
 
<input type="submit" name="Submit" value="submit">

</table>
</form>
</body>
</html>