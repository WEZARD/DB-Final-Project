<?php
session_start();

$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');

date_default_timezone_set('America/New_York');
$localtime = date("Y-m-d H:i:s");


if(isset($_POST['submit'])){
    $keyword = $_POST['keyword'];
    $sort = 'name';

    $user_name = $_SESSION['user_name'];
    $action = "$user_name searches keyword: $keyword";
    $user_log = "INSERT INTO User_log VALUES('$user_name','$action','$localtime')";
    mysqli_query($dbc,$user_log);
}


else{
    $keyword = $_GET['keyword'];
    $sort = $_GET['sort'];

    $user_name = $_SESSION['user_name'];
    $action = "$user_name clicks on tag: $keyword";
    $user_log = "INSERT INTO User_log VALUES('$user_name','$action','$localtime')";
    mysqli_query($dbc,$user_log);

}
    
//echo $sort;
//echo $keyword;

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<title>Fund Projects</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

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
                    
                    <!--<div class="searchbox fr">
                        <div class="selectContainer fl">
                            <span class="selectOption" id="jsSelectOption" data-value="course">
                            Project
                            </span>
                            <ul class="selectMenu" id="jsSelectMenu">
                                <li data-value="course">Project</li>
                                <li data-value="org">Description</li>
                                <li data-value="teacher">Category</li>
                            </ul>
                        </div>
                        <input id="search_keywords" class="fl" type="text" value="" placeholder="Content Here"/>
                        <img class="search_btn fr" id="jsSearchBtn" src="../images/search_btn.png"/>
                    </div>-->
                
                </div>
            </div>
            
            
			<nav>
				<div class="nav">
					<div class="wp">
						<ul>
							<li ><a href="index.php">Search</a></li>
							<li class="active">
								<a onClick="javascript:alert('Open Soon')">Project<img class="hot" src="../images/nav_hot.png"></a>
							</li>
							<li >
								<a href="history.php">History</a>
							</li>
							<li ><a href="newproject.php">Get Started</a></li>
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
            <ul  class="crumbs">
                <li><a href="index.php">Home</a>></li>
                <li>Project</li>
            </ul>
        </div>
    </section>


    <section>
	<div class="wp">
		<div class="list" style="margin-top:0;">
			<div class="left layout">
				
                <div class="head">
					<ul class="tab_header">
						

                        <?php

                        if($sort == 'description'){
                            echo'<li ><a href="project-list.php?sort=name&keyword=';
                            echo $keyword;
                            echo'">Name</a></li>';
                            echo'<li class="active"><a href="project-list.php?sort=description&keyword=';
                            echo $keyword;
                            echo'">Description</a></li>';
                            echo'<li ><a href="project-list.php?sort=category&keyword=';
                            echo $keyword;
                            echo'">Category</a></li>';
                        }
                        
						
                        elseif($sort =='category'){
                            echo'<li ><a href="project-list.php?sort=name&keyword=';
                            echo $keyword;
                            echo'">Name</a></li>';
                            echo'<li ><a href="project-list.php?sort=description&keyword=';
                            echo $keyword;
                            echo'">Description</a></li>';
                            echo'<li class="active"><a href="project-list.php?sort=category&keyword=';
                            echo $keyword;
                            echo'">Category</a></li>';
                        }


                        else{
                            echo'<li class="active"><a href="project-list.php?sort=name&keyword=';
                            echo $keyword;
                            echo'">Name</a></li>';
                            echo'<li><a href="project-list.php?sort=description&keyword=';
                            echo $keyword;
                            echo'">Description</a></li>';
                            echo'<li ><a href="project-list.php?sort=category&keyword=';
                            echo $keyword;
                            echo'">Category</a></li>';
                        }
						
					    ?>


                    </ul>
				</div>
                
                
                <div id="inWindow">
                    <div class="tab_cont " id="content">
					<div class="group_list">
                        
                            <?php
                            if($sort == 'name'){
                                $project_query = "SELECT * FROM Projects WHERE proname LIKE '%$keyword%'";
                                $project = mysqli_query($dbc,$project_query);
                                if(mysqli_num_rows($project)>0){
                                    while($rows=mysqli_fetch_assoc($project)){
                                        
                                        $proid = $rows["proid"];
                                        $like_query = "SELECT COUNT(*) AS num FROM `Like` WHERE proid = '$proid'";
                                        $like = mysqli_fetch_array(mysqli_query($dbc,$like_query));
                                        $var_like = $like['num'];

                                        echo'<div class="box">';
                                        echo'<a href="project-detail.php?proid=';
                                        echo $proid;
                                        echo'"><img width="280" height="350" class="scrollLoading" src="../media/beard/ZARD.jpg"/></a>';
                                        
                                        echo'<div class="des">';
                                        echo'<a href="project-detail.php?proid=';
                                        echo $proid;
                                        echo'"><h2 style="font-size:9px">';
                                        echo $rows["proname"];
                                        echo'</h2></a><span class="fl">minfunds<i class="key">';
                                        echo $rows["minfunds"];
                                        echo'</i></span><span class="fr">';
                                        echo $rows["realfunds"];
                                        echo' now</span>';
                                        echo'</div>';
                
                                        echo'<div class="bottom">';
                                        echo'<span class="fl">';
                                        echo $rows["login_name"];
                                        echo'</span><span class="star fr">';
                                        echo $var_like;
                                        echo'</span></div>';

                                        echo'</div>';
                                    }
                                }

                            }

                            if($sort == 'description'){
                                $project_query = "SELECT * FROM Projects WHERE prodescription LIKE '%$keyword%'";
                                $project = mysqli_query($dbc,$project_query);
                                if(mysqli_num_rows($project)>0){
                                    while($rows=mysqli_fetch_assoc($project)){
                                        
                                        $proid = $rows["proid"];
                                        $like_query = "SELECT COUNT(*) AS num FROM `Like` WHERE proid = '$proid'";
                                        $like = mysqli_fetch_array(mysqli_query($dbc,$like_query));
                                        $var_like = $like['num'];
                                        
                                        echo'<div class="box">';
                                        echo'<a href="project-detail.php?proid=';
                                        echo $proid;
                                        echo'"><img width="280" height="350" class="scrollLoading" src="../media/beard/ZARD.jpg"/></a>';
                                        
                                        echo'<div class="des">';
                                        echo'<a href="project-detail.php?proid=';
                                        echo $proid;
                                        echo'"><h2 style="font-size:9px">';
                                        echo $rows["proname"];
                                        echo'</h2></a><span class="fl">minfunds<i class="key">';
                                        echo $rows["minfunds"];
                                        echo'</i></span><span class="fr">';
                                        echo $rows["realfunds"];
                                        echo' now</span>';
                                        echo'</div>';
                
                                        echo'<div class="bottom">';
                                        echo'<span class="fl">';
                                        echo $rows["login_name"];
                                        echo'</span><span class="star fr">';
                                        echo $var_like;
                                        echo'</span></div>';

                                        echo'</div>';
                                    }
                                }

                            }
                            
                            if($sort == 'category'){
                                $project_query = "SELECT * FROM Projects WHERE category LIKE '%$keyword%'";
                                $project = mysqli_query($dbc,$project_query);
                                if(mysqli_num_rows($project)>0){
                                    while($rows=mysqli_fetch_assoc($project)){
                                        
                                        $proid = $rows["proid"];
                                        $like_query = "SELECT COUNT(*) AS num FROM `Like` WHERE proid = '$proid'";
                                        $like = mysqli_fetch_array(mysqli_query($dbc,$like_query));
                                        $var_like = $like['num'];
                                        
                                        echo'<div class="box">';
                                        echo'<a href="project-detail.php?proid=';
                                        echo $proid;
                                        echo'"><img width="280" height="350" class="scrollLoading" src="../media/beard/ZARD.jpg"/></a>';
                                        
                                        echo'<div class="des">';
                                        echo'<a href="project-detail.php?proid=';
                                        echo $proid;
                                        echo'"><h2 style="font-size:9px">';
                                        echo $rows["proname"];
                                        echo'</h2></a><span class="fl">minfunds<i class="key">';
                                        echo $rows["minfunds"];
                                        echo'</i></span><span class="fr">';
                                        echo $rows["realfunds"];
                                        echo' now</span>';
                                        echo'</div>';
                
                                        echo'<div class="bottom">';
                                        echo'<span class="fl">';
                                        echo $rows["login_name"];
                                        echo'</span><span class="star fr">';
                                        echo $var_like;
                                        echo'</span></div>';

                                        echo'</div>';
                                    }
                                }

                            }

                            ?>




					</div>
                    <div class="pageturn">
                        <ul class="pagelist">
                   
                                
                                    
                                        <li class="active"><a>1</a></li>
                                    
                      
                            
                            
                                <li class="long"><a>Next</a></li>
                            

                        </ul>
                    </div>
				</div>
                </div>
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

</body>
</html>
