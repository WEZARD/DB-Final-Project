<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','XXXXXX','Project');
$user_name = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<title>Fund System</title>
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

                        
                        <!-- <a style="color:white" class="fr registerbtn" href="register.html">注册</a> -->
                        <!-- <a style="color:white" class="fr loginbtn" href="login.html">登录</a>  -->
						
						<div class="personal">
                            <dl class="user fr">
                                
                                <dd><?echo $_SESSION['user_name']; ?><img class="down fr" src="../images/top_down.png"/></dd>
                                <dt><img width="20" height="20" src="../media/image/2016/12/default_big_14.png"/></dt>
                            </dl>
                            <div class="userdetail">
                            	<dl>
	                                <dt><img width="80" height="80" src="../media/image/2016/12/default_big_14.png"/></dt>
	                                <dd>
	                                    <h2><?echo $_SESSION['user_name']; ?></h2>
	                                    <p><?echo $_SESSION['user_realname']; ?></p>
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
                    
                    <div class="searchbox fr">
                        <form method = "post" action="project-list.php">
                        <label for="keyword">Keyword:</label>
                        <input type="text" id="keyword" name="keyword"/>
                        <input type="submit" style="display:none" value="GO" name="submit"/>
                        </form>
                    </div>
                
                </div>
            </div>
            
            
			<nav>
				<div class="nav">
					<div class="wp">
						<ul>
							<li class="active" ><a href="index.php">Discover</a></li>
							<li >
								<a href="index.php" onClick="javascript:alert('Open Soon')">Project<img class="hot" src="../images/nav_hot.png"></a>
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


<!--module1 start-->
	<section>
		<div class="module">
			<div class="wp">
				<h1 style="font-size:18px">Projects Related to You</h1>
				<div class="module1 eachmod">
					<div class="module1_1 left">
						<img width="228" height="614" src="../images/module1_1.jpg"/>
						<p class="fisrt_word" style="font-size:16px">Recommendation</p>
						
                        <?php
                        $interests = $_SESSION['user_interests'];
                        $reproject_query =  "SELECT * FROM Projects WHERE category LIKE '%$interests%' and status = 'funding' limit 1";
                        $reproject = mysqli_fetch_array(mysqli_query($dbc, $reproject_query));
                        if(mysqli_num_rows(mysqli_query($dbc, $reproject_query))>0)
                        $proid = $reproject["proid"];
                        else{
                            $reproject_query1 =  "SELECT * FROM Projects WHERE status = 'funding' limit 1";
                            $reproject1 = mysqli_fetch_array(mysqli_query($dbc, $reproject_query1));
                            $proid = $reproject1["proid"];
                        }

                        echo'<a class="more" href="project-detail.php?proid=';
                        echo $proid;
                        echo'">Discover ></a>';


                        ?>
					</div>
					<div class="right group_list">
						

                        <div class="module1_2 box">
							<div class="imgslide2">
								<ul class="imgs"">
                                    
                                <?
                                $follow_query = "SELECT * FROM Follow WHERE login_name1 = '$user_name'";
                                $follow = mysqli_query($dbc, $follow_query);
                                if(mysqli_num_rows($follow)>0){
                                    while($rows=mysqli_fetch_assoc($follow)){
                                    $followname = $rows["login_name2"];
                                    $followpro_query = "SELECT * FROM Projects WHERE login_name = '$followname' AND status = 'funding' limit 1";
                                    $followpro = mysqli_fetch_array(mysqli_query($dbc, $followpro_query));
                                    $proid = $followpro["proid"];

                                    if(mysqli_num_rows(mysqli_query($dbc, $followpro_query))>0){
                                    echo'<li><a href="project-detail.php?proid=';
                                    echo $proid;
                                    echo'"><img width="233" height="190" src="../images/fantasy-ll.jpg" /></a></li>';    
                                    }
                                    
                                    }
                                }
                                ?>

                                    
								</ul>
							</div>
							<div class="unslider-arrow2 prev"></div>
							<div class="unslider-arrow2 next"></div>
						</div>
                       
                       <!--   ------------------------------user likeinfo form--------------------------------  --> 

                            <?php
                            $likepro_query = "SELECT * FROM `Like` WHERE login_name = '$user_name'";
                            $likepro = mysqli_query($dbc, $likepro_query);
                            if(mysqli_num_rows($likepro) > 0){
                                    $var = 3;
                                    while($rows=mysqli_fetch_assoc($likepro)){
                                        $proid = $rows["proid"];
                                        $like_query = "SELECT COUNT(*) AS num FROM `Like` WHERE proid = '$proid'";
                                        $like = mysqli_fetch_array(mysqli_query($dbc, $like_query));
                                        $var_like = $like['num'];

                                        $detail_query ="SELECT * FROM Projects WHERE proid = '$proid'";
                                        $detail = mysqli_fetch_array(mysqli_query($dbc, $detail_query));
                                        echo'<div class="module1_';
                                        echo $var;
                                        echo' box">';

                                        echo'<a href="project-detail.php?proid=';
                                        echo $proid;
                                        echo'"><img width="233" height="190" src="../media/beard/ZARD.jpg"/></a>';

                                        echo'<div class="des">';
                                        echo'<a href="project-detail.php?proid=';
                                        echo $proid;
                                        echo'"><h2 style="font-size:9px">';
                                        echo $detail["proname"];
                                        echo'</h2></a><span class="fl">minfunds<i class="key">';
                                        echo $detail["minfunds"];
                                        echo'</i></span><span class="fr">';
                                        echo $detail["realfunds"];
                                        echo' now</span>';
                                        echo'</div>';
                
                                        echo'<div class="bottom">';
                                        echo'<span class="fl">';
                                        echo $detail["login_name"];
                                        echo'</span><span class="star fr">';
                                        echo $var_like;
                                        echo'</span></div>';

                                        echo'</div>';
               

                                        $var = $var + 1;
                                }
                            }
                            ?>

                            <!--   ------------------------------user likeinfo form--------------------------------  -->

                            
                            
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--<section>
		<div class="module greybg">
			<div class="wp">
				<h1>课程机构</h1>
				<div class="module3 eachmod">
					<div class="module3_1 left">
						<img width="228" height="463" src="../images/module3_1.jpg"/>
						<p class="fisrt_word">名校来袭<br/>权威认证</p>
						<a class="more" href="org-list.html">查看更多机构 ></a>
					</div>
					<div class="right">
						<ul>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/imooc.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕课网">慕课网</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/bjdx.jpg"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="北京大学">北京大学</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/qhdx-logo.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="清华大学">清华大学</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/njdx.jpg"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="南京大学">南京大学</span></p>
                                    </a>
                                </li>
                            
                                <li class="five">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/imooc_klgAUn5.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕课网2">慕课网2</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/imooc_Gn1sRjp.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕课网3">慕课网3</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/imooc_Y2Tonsq.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕课网3">慕课网3</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/imooc_OO2ykYP.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕课网4">慕课网4</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/imooc_V0TJOyb.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕课网5">慕课网5</span></p>
                                    </a>
                                </li>
                            
                                <li class="five">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/11/imooc_qEaMov1.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕课网666">慕课网666</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/12/bjdx.jpg"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕学网">慕学网</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/12/imooc_Gn1sRjp.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="python培训机构">python培训机构</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/12/bjdx_cCpdUw8.jpg"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="vuejs培训">vuejs培训</span></p>
                                    </a>
                                </li>
                            
                                <li class="">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/12/imooc_klgAUn5.png"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="nodejs培训">nodejs培训</span></p>
                                    </a>
                                </li>
                            
                                <li class="five">
                                    <a href="org-detail-homepage.html">
                                        <div class="company">
                                            <img width="184" height="100" src="../media/org/2016/12/bjdx_bcd0m07.jpg"/>
                                            <div class="score">
                                                <div class="circle">
                                                    <h2>全国知名</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <p><span class="key" title="慕学在线">慕学在线</span></p>
                                    </a>
                                </li>
                            
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>-->



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

    <script type="text/javascript" src="../js/index.js"></script>

</body>
</html>
