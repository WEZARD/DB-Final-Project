<?php
session_start();

$user_name = $_SESSION['user_name'];

$proid = $_GET['proid'];

$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');

date_default_timezone_set('America/New_York');
$localtime = date("Y-m-d H:i:s");


$project_query = "SELECT * FROM Projects WHERE proid = '$proid'";
$project = mysqli_fetch_array(mysqli_query($dbc,$project_query));
$var_proname = $project['proname'];
$var_prodescription = $project['prodescription'];
$var_category = $project['category'];
$var_minfunds = $project['minfunds'];
$var_maxfunds = $project['maxfunds'];
$var_realfunds = $project['realfunds'];
$var_name = $project['login_name'];
$var_posttime = $project['posttime'];
$var_endtime = $project['endtime'];
$var_plantime = $project['plantime'];
$var_status = $project['status'];
$var_rating = $project['rating'];



$action = "$user_name looks at project: $var_proname";
$user_log = "INSERT INTO User_log VALUES('$user_name','$action','$localtime')";
mysqli_query($dbc,$user_log);





if($localtime > $var_endtime && $var_realfunds < $var_minfunds && $var_status = 'funding'){
	$failed_query = "UPDATE Projects SET status = 'funds_failed' WHERE proid = '$proid'";
	mysqli_query($dbc,$failed_query);
	$$var_status = 'funds_failed';
	$charge_query = "UPDATE Record SET status = 'failed', chargetime = '$localtime' WHERE proid = $proid";
	mysqli_query($dbc,$charge_query);
}

if($localtime > $var_endtime && $var_realfunds > $var_minfunds && $var_status = 'funding'){
	$ongoing_query = "UPDATE Projects SET status = 'ongoing' WHERE proid = '$proid'";
	mysqli_query($dbc,$ongoing_query);
	$var_status = 'ongoing';
}

if($localtime > $var_plantime && $var_realfunds > $var_minfunds && $var_status = 'funding'){
	$complete_query = "UPDATE Projects SET status = 'completed' WHERE proid = '$proid'";
	mysqli_query($dbc,$complete_query);
	$var_status = 'completed';
}

if($localtime > $var_plantime && $var_status = 'ongoing'){
	$complete_query = "UPDATE Projects SET status = 'completed' WHERE proid = '$proid'";
	mysqli_query($dbc,$complete_query);
	$var_status = 'completed';
}



$like_query = "SELECT COUNT(*) AS num FROM `Like` WHERE proid = '$proid'";
$like = mysqli_fetch_array(mysqli_query($dbc,$like_query));
$var_like = $like['num'];

$history_query = "SELECT COUNT(*) AS num FROM Projects WHERE login_name = '$var_name'";
$history = mysqli_fetch_array(mysqli_query($dbc,$history_query));
$var_history = $history['num'];

$interests_query = "SELECT interests FROM User WHERE login_name = '$var_name'";
$interests = mysqli_fetch_array(mysqli_query($dbc,$interests_query));
$var_interests = $interests['interests'];


$complete_query = "SELECT COUNT(*) AS num FROM Projects WHERE login_name = '$var_name' and status = 'complete'";
$complete = mysqli_fetch_array(mysqli_query($dbc,$complete_query));
$var_complete = $complete['num'];

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<title>Project Details proid: <?echo $_GET['proid'];?></title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

<script language=JavaScript>  
<!--  

function InputCheck(pledge_form)  
{  
  if (pledge_form.pledge.value > (<?echo $var_maxfunds;?> - <?echo $var_realfunds;?>) )  
  {  
    alert("Over Pledge");  
    pledge_form.pledge.focus(); 
    return (false);
  }  
  
}  
  
function InputCheck1(rate_form)  
{  
  if (rate_form.rate.value > 5 || rate_form.rate.value < 1 ) 
  {  
    alert("Rate Error");  
    rate_form.rate.focus(); 
    return (false);
  }  
  
}  


//-->  
</script>  




</head>
<body>
<section class="headerwrap ">
    <header>
		<div  class=" header">
 			<div class="top">
				<div class="wp">
					<div class="fl"><p>Customer Service：<b>9292888888</b></p></div>
					<!--登录后跳转-->

                        
                        <div class="personal">
                            <dl class="user fr">
                                <dd><? echo $_SESSION['user_name']; ?><img class="down fr" src="../images/top_down.png"/></dd>
                                <dt><img width="20" height="20" src="../media/image/2016/12/default_big_14.png"/></dt>
                            </dl>
                            <div class="userdetail">
                            	<dl>
	                                <dt><img width="80" height="80" src="../media/image/2016/12/default_big_14.png"/></dt>
	                                <dd>
	                                    <h2><? echo $_SESSION['user_name']; ?></h2>
	                                    <p><? echo $_SESSION['user_realname']; ?></p>
	                                </dd>
                                </dl>
                                <div class="btn">
	                                <a class="personcenter fl" href="usercenter.php">Profile</a>
                                    <a class="fr" href="logout.php">Exit</a>
                                </div>
                            </div>
                        </div>
  

				</div>
			</div>

            <div class="middle">
                <div class="wp">
                    <a href="index.php"><img class="fl" src="../images/dblogo.png"/></a>
                    
                </div>
            </div>
            
            
			<nav>
				<div class="nav">
					<div class="wp">
						<ul>
							<li ><a href="index.php">Discover</a></li>
							<li class="active">
								<a onClick="javascript:alert('Open Soon')">Project<img class="hot" src="../images/nav_hot.png"></a>
							</li>
							<li >
								<a href="history.php">History</a>
							</li>
							<li ><a href="newproject.php">Get Started<img class="hot" src="../images/nav_hot.png"></a></li>
						</ul>
					</div>
				</div>
			</nav>
            
			</div>
    </header>
</section>
<!--crumbs start-->

    <section>
	<div class="wp">
		<div class="crumbs">
			<ul>
				<li><a href="index.php">Home</a>></li>
				<li>Project Details</li>
			</ul>
		</div>
	</div>
</section>


    <section>
	<div class="wp">
		<div class="groupPurchase_detail detail">
			<div class="toppro">
				
				<!--   ------------------------------left part--------------------------------  -->

				<div class="left">
					<div class="picbox">
						<div class="tb-booth tb-pic">
							<img width="440" height="445" src="../media/beard/ZARD.jpg" class="jqzoom" />
						</div>

					</div>
					<div class="des">
						<h1 title="project name"><?echo $var_proname;?></h1>
						<span class="key"><?echo $var_prodescription;?></span>
						<div class="prize">
							
							<span class="fl">Category:<i class="key"><a href="project-list.php?sort=category&keyword=<?echo $var_category;?>"><?echo $var_category;?></a></i></span>
							
							<span class="fr"><?echo $var_status;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rating: <?echo $var_rating;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Like：<?echo $var_like;?></span>
						</div>
						<ul class="parameter">
							<li><span class="pram word3">Targetfunds:</span><span>&nbsp;&nbsp;&nbsp;&dollar;<?echo $var_minfunds;?>&nbsp;&nbsp;&nbsp;&mdash;&nbsp;&nbsp;&nbsp;&dollar;<?echo $var_maxfunds;?></span><span class="pram word3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Funds Now:</span><span title="">&nbsp;&nbsp;&nbsp;&dollar;<?echo $var_realfunds;?></span></li>
                            
							<li><span class="pram word3">Fund Time:</span><span>&nbsp;&nbsp;&nbsp;<?echo $var_posttime;?>&nbsp;&nbsp;&nbsp;&mdash;&nbsp;&nbsp;&nbsp;<?echo $var_endtime;?></span></li>
							<li><span class="pram word3">Plan Finished:</span><span title="">&nbsp;&nbsp;&nbsp;<?echo $var_plantime;?></span></li>


							<li class="piclist"><span class="pram word4">User:&nbsp;&nbsp;&nbsp;</span>
                                
                                    <span class="pic"><img width="40" height="40" src="../media/image/2016/12/default_big_14.png"/></span>
                                    <span><?echo $var_name;?></span>
                                
							</li>

							<li></li>
							<!--   ------------------------------pledge part--------------------------------  -->
							
							<?php
							if($var_status == 'funding')
								$check_form = '';
							else
								$check_form = 'display:none';

							?>
							
							
							<form name = "pledge form"  style="<?echo $check_form;?>" method = "post" action="pledge.php?proid=<?echo $proid;?>" onSubmit="return InputCheck(this)">
                        		<label for="pledge">Plege Now:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        		
                        		<input style ="width:60px;height:30px" type="text" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" id="pledge" name="pledge"/>
                        		<input type="submit" style="display:none" value="GO" name="submit"/>
                        	
                        	</form>
							
							<!--   ------------------------------rate part--------------------------------  -->
                        	
                        	<?php

                        	$check1_query = "SELECT * FROM Record WHERE login_name = '$user_name' and proid = $proid";
                        	$check1 = mysqli_query($dbc,$check1_query);
                            if(mysqli_num_rows($check1)>0)
                            $var1 = 1;

                        	$check2_query = "SELECT * FROM Rate WHERE login_name = '$user_name' and proid = $proid";
                        	$check2 = mysqli_query($dbc,$check2_query);
                            if(mysqli_num_rows($check2)>0)
                            $var2 = 0;
                        	else
                        	$var2 = 1;
                        	


                        	if($var_status == 'completed' && $var1 == 1 && $var2 == 1)
                        		$check_form2 = '';
                        	else
                        		$check_form2 = 'display:none';

                        	?>


                        	<form name = "rate form"  style="<?echo $check_form2;?>" method = "post" action="rate.php?proid=<?echo $proid;?>" onSubmit="return InputCheck1(this)">
                        		<label for="rate">Rate Now:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        		
                        		<input style ="width:60px;height:30px" type="text" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();" id="rate" name="rate"/>
                        		<input type="submit" style="display:none" value="GO" name="submit"/>
                        	
                        	</form>



							<li></li>

							

							<!--   ------------------------------comment part--------------------------------  -->

							<form method = "post" action="comment.php?proid=<?echo $proid;?>">
                        		<label for="comment">Comment Here:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        		<input style ="width:250px;height:25px" type="text" id="comment" name="comment"/>
                        		<input type="submit" style="display:none" value="GO" name="submit"/>
                        	</form>

                        	<li></li>




						</ul>
						
						<!--   ------------------------------like part--------------------------------  -->
						<div class="btns">
							
							
							
						<?
						if($user_name == $var_name)
								$check_form3 = '';
							else
								$check_form3 = 'display:none';
						?>

							<div class="btn colectgroupbtn" style="<?echo $check_form3;?>"><a href="upload_image_todb.php?para=<?echo $proid;?>">Upload</a></div>
                                
					






					<?php
		
						$likepro_query = "SELECT * FROM `Like` where login_name = '$user_name' and proid = '$proid'";
						$likepro = mysqli_query($dbc,$likepro_query);
						
						if(mysqli_num_rows($likepro)==1){
							echo'<div class="buy btn"><a style="color: white" href="like.php?para=unlike&proid=';
							echo $proid;
							echo'">Unlike</a></div>';
						}
						
						
						else{
							echo'<div class="buy btn"><a style="color: white" href="like.php?para=like&proid=';
							echo $proid;
							echo'">like</a></div>';

						}
						

					
					
					
					?>

						</div>
					</div>
                    
				</div>
				<!--   ------------------------------left part--------------------------------  -->


				
				









				<!--   ------------------------------right part--------------------------------  -->

				<div class="right">
					<div class="head">
						<h1>Whose Project</h1>
						<p>Plege to realize a dream</p>
					</div>
					<div class="pic">
                        <a >
                            <img width="150" height="80" src="../media/beard/ZARD.jpg"/>
                        </a>
                    </div>
					<?
					echo'<a href="userinfo.php?name=';
					echo $var_name;
					echo'">';
                    
                    ?>
                        <h2 class="center" title="username"><? echo $var_name;?></h2>
                    </a>
					
                        <h2 class="center" title="blank">&nbsp;&nbsp;&nbsp;</h2>


					<div class="clear">
						<ul>
                            <li>
                                <span>Projects:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo $var_history;?></span>
                            </li>
                            <li>
                                <span>Complete:&nbsp;&nbsp;&nbsp;&nbsp;<?echo $var_complete;?></span>
                            </li>
							<li>Interests：&nbsp;&nbsp;<?echo $var_interests;?></li>
							<li>Honor Level:
                                &nbsp;&nbsp;
								    <img title="Gold", src="../images/gold.png"/>
							</li>
						</ul>
					</div>



					<?php
					
					if($user_name != $var_name){
						$follow_query = "SELECT * FROM Follow where login_name1 = '$user_name' and login_name2 = '$var_name'";
						$follow = mysqli_query($dbc,$follow_query);
						
						if(mysqli_num_rows($follow)==1){
							echo'<div class="btn"><a href="follow.php?para=unfollow&para2=';
							echo $var_name;
							echo'&proid=';
							echo $proid;
							echo'">Following</a></div>';
						}
						
						
						else{
							echo'<div class="btn"><a href="follow.php?para=follow&para2=';
							echo $var_name;
							echo'&proid=';
							echo $proid;
							echo'">Follow</a></div>';

						}
						

					}
					
					
					
					?>

				</div>
			
				<!--   ------------------------------right part--------------------------------  -->


			</div>
		</div>
	</div>
</section>
    <section>
	<div class="wp">
		
		<div class="list groupPurchase_detail_pro">
			<div class="left layout">
				<div class="head">
					<ul class="tab_header">
						<li class="active">Details</li>
					</ul>
				</div>
				
				




				<div class="tab_cont tab_cont1">
                    
					<?
					$find_query = "SELECT * FROM `UPDATE` WHERE proid = $proid";
					$find = mysqli_query($dbc,$find_query);
                     	if(mysqli_num_rows($find)>0){
                               while($rows=mysqli_fetch_assoc($find)){
                               	$id = $rows["id"];
                               	$utime = $rows["utime"];
                               	echo'<p><img src="showphoto.php?para=';
                               	echo $proid;
                               	echo'&id=';
                               	echo $id;
                               	echo'" widht="129" height="123"/></p>';
         						echo'<p>';
         						echo $utime;
         						echo'</p>';

                               }
                           }



					?>


					<!--<p>&nbsp; &nbsp;<p><img src="showphoto.php?para=<?php echo $proid; ?>" widht="129" height="123"/>  </p>-->
                    

				</div>
			</div>
			
		</div>
	</div>
	</section>


<section>
	<div class="wp list personal_list">

    
    
		<div class="personal_des ">
			<div class="head" style="border:1px solid #eaeaea;">
				<h1>Comments</h1>
			</div>
			<div class="inforcon">
                <!--   ------------------------------user log form--------------------------------  -->
                
                <form class="perinform" id="jsEditUserForm" name="comment_form" autocomplete="off">
					<ul class="right">
						
                    <?php
                    $comment_query = "SELECT * FROM Comment where proid = $proid order by ctime desc";
                    $comment = mysqli_query($dbc,$comment_query);
                    if(mysqli_num_rows($comment)>0){
                        while($rows=mysqli_fetch_assoc($comment)){
                                    $content = $rows["content"];
                                    $time = $rows["ctime"];
                                    $comment_name = $rows["login_name"];
                                    echo'<li><a href="userinfo.php?name=';
                                    echo $comment_name;
                                    echo'">';
                                    echo $comment_name;
                                    echo'</a><input style="width:520px;font-size:9px" type="text" name="comment_name" value="';
                                   	echo $content;
                                   	echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                   	echo $time;
                                    echo'" readonly="readonly"/></li>';
                                }
                    }


                    ?>

					</ul>
				</form>
                <!--   ------------------------------user log form--------------------------------  -->

			</div>
		</div>
	


	</div>
</section>


<section>
    <ul class="sidebar">
        <li class="totop"></li>
    </ul>
</section>
<script src="../js/selectUi.js" type='text/javascript'></script>
<script src="../js/deco-common.js" type='text/javascript'></script>
<script type="text/javascript" src="../js/plugins/laydate/laydate.js"></script>
<script src="../js/plugins/layer/layer.js"></script>
<script src="../js/plugins/queryCity/js/public.js" type="text/javascript"></script>
<script src="../js/unslider.js" type="text/javascript"></script>
<script src="../js/plugins/jquery.scrollLoading.js"  type="text/javascript"></script>
<script src="../js/deco-common.js"  type="text/javascript"></script>

<script type="text/javascript">
//收藏分享
function add_fav(current_elem, fav_id, fav_type){
    $.ajax({
        cache: false,
        type: "POST",
        url:"/org/add_fav/",
        data:{'fav_id':fav_id, 'fav_type':fav_type},
        async: true,
        beforeSend:function(xhr, settings){
            xhr.setRequestHeader("X-CSRFToken", "5I2SlleZJOMUX9QbwYLUIAOshdrdpRcy");
        },
        success: function(data) {
            if(data.status == 'fail'){
                if(data.msg == '用户未登录'){
                    window.location.href="login.html";
                }else{
                    alert(data.msg)
                }

            }else if(data.status == 'success'){
                current_elem.text(data.msg)
            }
        },
    });
}

$('#jsLeftBtn').on('click', function(){
    add_fav($(this), 10, 1);
});

$('#jsRightBtn').on('click', function(){
    add_fav($(this), 2, 2);
});


</script>


</body>
</html>
