<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
$user_name = $_SESSION['user_name'];

if(isset($_GET['sort']))
$sort = $_GET['sort'];
else
$sort = 'follower';


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<title>My Like</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../js/plugins/queryCity/css/cityLayout.css">
    
    <link rel="stylesheet" type="text/css" href="../css/lq.datetimepick.css"/>



    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

</head>
<body>
<section class="headerwrap headerwrap2">
    <header>
        <div  class="header2 header">
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
            <h1>Follow/Like Information</h1>
        </div>
    </div>
			</div>
    </header>
</section>



<!--crumbs start-->

    <section>
        <div class="wp">
            <ul  class="crumbs">
                <li><a href="index.php">Home</a>></li>
                <li>My Follow/Like</li>
            </ul>
        </div>
    </section>

<section>
    <div class="wp list personal_list">
    <div class="left">
        <ul>
            <li ><a href="usercenter.php">Information</a></li>
            <li ><a href="usercenter-project.php">My Projects</a></li>
            <li class="active2"><a href="usercenter-follow.php">Follow/Like</a></li>
            <li >
                <a href="message.php" style="position: relative;">
                    Messages
                </a>
            </li>
        </ul>
    </div>

    <!--   ------------------------------user followinfo form--------------------------------  -->    
    <div class="right" >
            <div class="personal_des Releasecont">
                <div class="head">
                    <h1>Follow/Like Info</h1>
                </div>
            </div>
            <div class="personal_des permessage">
                <div class="head">
                    <ul class="tab_header messagehead">
                        
                    <?php

                        if($sort == 'following'){
                            echo'<li ><a href="usercenter-follow.php?sort=follower">Follower</a></li>';
                            echo'<li class="active"><a href="usercenter-follow.php?sort=following">Following</a></li>';
                            echo'<li ><a href="usercenter-follow.php?sort=like">Like</a></li>';
                        }
                        
                        
                        elseif($sort =='like'){
                            echo'<li ><a href="usercenter-follow.php?sort=follower">Follower</a></li>';
                            echo'<li ><a href="usercenter-follow.php?sort=following">Following</a></li>';
                            echo'<li class="active"><a href="usercenter-follow.php?sort=like">Like</a></li>';
                        }


                        else{
                            echo'<li class="active"><a href="usercenter-follow.php?sort=follower">Follower</a></li>';
                            echo'<li ><a href="usercenter-follow.php?sort=following">Following</a></li>';
                            echo'<li ><a href="usercenter-follow.php?sort=like">Like</a></li>';
                        }
                        
                        ?>
                    

                    </ul>
                </div>
                
                
                <?php
                

                if($sort == 'follower'){
                echo'<div class="messagelist">';
    
                    $follower_query = "SELECT * FROM Follow WHERE login_name2 = '$user_name'";
                    $follower = mysqli_query($dbc,$follower_query);
                    if(mysqli_num_rows($follower)>0){
                    while($rows=mysqli_fetch_assoc($follower)){
                    $followername = $rows["login_name1"];
                    $info_query = "SELECT * FROM User WHERE login_name = '$followername'";
                    $info=mysqli_fetch_array(mysqli_query($dbc,$info_query));
                    echo'<div class=" butler_list butler-fav-box">';
                        echo'<dl class="des users">';
                            echo'<dt><a href="/org/teacher/detail/1/"><img width="100" height="100" src="../media/beard/ZARD.jpg"/></a></dt>';
                            
                            echo'<dd>';
                                
                                

                                            echo'<h1><a href="/org/teacher/detail/1/">';
                                            echo $info["login_name"];
                                            echo'<span class="key">Honor level</span></a></h1>';
                                
                                            echo'<ul class="cont clearfix"><li class="time">Realname:&nbsp;&nbsp;&nbsp;&nbsp;<span>';
                                            echo $info["name"];

                                            echo'</span></li><li class="time">Interests:&nbsp;&nbsp;&nbsp;&nbsp;<span>';
                                            echo $info["interests"];
                                            echo'</span></li></ul>';
                            
                            echo'</dd>';
                            
                        echo'</dl>';
                    echo'</div>';   
                    }
                }
                echo'</div>';
                }

                

                if($sort == 'following'){
                echo'<div class="messagelist">';
    
                    $following_query = "SELECT * FROM Follow WHERE login_name1 = '$user_name'";
                    $following = mysqli_query($dbc,$following_query);
                    
                    if(mysqli_num_rows($following)>0){
                    while($rows=mysqli_fetch_assoc($following)){
                    $followingname = $rows["login_name2"];
                    $info_query = "SELECT * FROM User WHERE login_name = '$followingname'";
                    $info=mysqli_fetch_array(mysqli_query($dbc,$info_query));


                    echo'<div class=" butler_list butler-fav-box">';
                        echo'<dl class="des users">';
                            echo'<dt><a href="/org/teacher/detail/1/"><img width="100" height="100" src="../media/beard/ZARD.jpg"/></a></dt>';
                            
                            echo'<dd>';
                                
                                
                                            echo'<h1><a href="/org/teacher/detail/1/">';
                                            echo $info["login_name"];
                                            echo'<span class="key">Honor level</span></a></h1>';
                                
                                            echo'<ul class="cont clearfix"><li class="time">Realname:&nbsp;&nbsp;&nbsp;&nbsp;<span>';
                                            echo $info["name"];

                                            echo'</span></li><li class="time">Interests:&nbsp;&nbsp;&nbsp;&nbsp;<span>';
                                            echo $info["interests"];
                                            echo'</span></li></ul>';
                            
                            echo'</dd>';
                            
                            echo'<div class="delete jsDeleteFav_teacher" data-favid="1"></div>';
                        echo'</dl>';
                    echo'</div>';   
                
                    }
                }
                
                echo'</div>';
                
                }

                

                if($sort == 'like'){

                echo'<div class="companycenter">';
                echo'<div class="group_list brief">';


                $prolike_query = "SELECT * FROM `Like` WHERE login_name = '$user_name'";
                $prolike = mysqli_query($dbc,$prolike_query);
                
                if(mysqli_num_rows($prolike)>0){
                    while($rows=mysqli_fetch_assoc($prolike)){
                        $proid = $rows["proid"];
                        $like_query = "SELECT COUNT(*) AS num FROM `Like` WHERE proid = '$proid'";
                        $like = mysqli_fetch_array(mysqli_query($dbc,$like_query));
                        $var_like = $like['num'];

                        $detail_query ="SELECT * FROM Projects WHERE proid = '$proid'";
                        $detail = mysqli_fetch_array(mysqli_query($dbc,$detail_query));


                        echo'<div class="module1_5 box">';
                        echo'<a href="project-detail.php?proid=';
                        echo $proid;
                        echo'"><img width="214" height="190" class="scrollLoading" src="../media/beard/ZARD.jpg"/></a>';
               
                        
                        echo'<div class="des">';
                        echo'<a href="project-detail.php?proid=';
                        echo $proid;
                        echo'"><h2>';
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
                    }
                }   
                


                echo'</div></div>';

                }



                ?>

            </div>
        </div>
        <!--   ------------------------------user followinfo form--------------------------------  -->

    </div>
</section>


<!--sidebar start-->
<section>
    <ul class="sidebar">
        <li class="totop"></li>
    </ul>
</section>
<!--sidebar end-->
<!--header start-->


<div class="bg" id="dialogBg"></div>


<script src="../js/selectUi.js" type='text/javascript'></script>
<script type="text/javascript" src="../js/plugins/laydate/laydate.js"></script>
<script src="../js/plugins/layer/layer.js"></script>
<script src="../js/plugins/queryCity/js/public.js" type="text/javascript"></script>
<script src="../js/unslider.js" type="text/javascript"></script>
<script src="../js/plugins/jquery.scrollLoading.js"  type="text/javascript"></script>
<script src="../js/validateDialog.js"  type="text/javascript"></script>
<script src="../js/deco-common.js"  type="text/javascript"></script>

<script src='../js/plugins/jquery.upload.js' type='text/javascript'></script>
<script src="../js/validate.js" type="text/javascript"></script>
<script src="../js/deco-user.js"></script>

<script type="text/javascript">
    $('.jsDeleteFav_course').on('click', function(){
        var _this = $(this),
            favid = _this.attr('data-favid');
        alert(favid)
        $.ajax({
                cache: false,
                type: "POST",
                url: "/org/add_fav/",
                data: {
                    fav_type: 1,
                    fav_id: favid,
                    csrfmiddlewaretoken: '799Y6iPeEDNSGvrTu3noBrO4MBLv6enY'
                },
                async: true,
                success: function(data) {
                    Dml.fun.winReload();
                }
            });
    });

    $('.jsDeleteFav_teacher').on('click', function(){
            var _this = $(this),
                favid = _this.attr('data-favid');
            $.ajax({
                    cache: false,
                    type: "POST",
                    url: "/org/add_fav/",
                    data: {
                        fav_type: 3,
                        fav_id: favid,
                        csrfmiddlewaretoken: '799Y6iPeEDNSGvrTu3noBrO4MBLv6enY'
                    },
                    async: true,
                    success: function(data) {
                        Dml.fun.winReload();
                    }
                });
        });


    $('.jsDeleteFav_org').on('click', function(){
            var _this = $(this),
                favid = _this.attr('data-favid');
            $.ajax({
                    cache: false,
                    type: "POST",
                    url: "/org/add_fav/",
                    data: {
                        fav_type: 2,
                        fav_id: favid,
                        csrfmiddlewaretoken: '799Y6iPeEDNSGvrTu3noBrO4MBLv6enY'
                    },
                    async: true,
                    success: function(data) {
                        Dml.fun.winReload();
                    }
                });
        });
</script>


<script>
        var shareUrl = '',
            shareText = '',
            shareDesc = '',
            shareComment = '';
        $(function () {
            $(".bdsharebuttonbox a").mouseover(function () {
                var type = $(this).attr('data-cmd'),
                    $parent = $(this).parent('.bdsharebuttonbox'),
                    fxurl = $parent.attr('data-url'),
                    fxtext = $parent.attr('data-text'),
                    fxdesc = $parent.attr('data-desc'),
                    fxcomment = $parent.attr('data-comment');
                switch (type){
                    case 'tsina':
                    case 'tqq':
                    case 'renren':
                            shareUrl = fxurl;
                            shareText = fxdesc;
                            shareDesc = '';
                            shareComment = '';
                        break;
                    default :
                            shareUrl = fxurl;
                            shareText = fxtext;
                            shareDesc = fxdesc;
                            shareComment = fxcomment;
                        break;
                }
            });
        });
        function SetShareUrl(cmd, config) {
            if (shareUrl) {
                config.bdUrl = "" + shareUrl;
            }
            if(shareText){
                config.bdText = shareText;
            }
            if(shareDesc){
                config.bdDesc = shareDesc;
            }
            if(shareComment){
                config.bdComment = shareComment;
            }

            return config;
        }
        window._bd_share_config = {
            "common": {
                "onBeforeClick":SetShareUrl,
                "bdPic":"",
                "bdMini":"2",
                "searchPic":"1",
                "bdMiniList":false
            },
            "share": {
                "bdSize":"16"
            }
        };
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com../api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
</body>
</html>
