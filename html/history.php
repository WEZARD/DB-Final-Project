<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
$user_name = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<title><? echo $_SESSION['user_name']; ?></title>
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
            <h1>History Page</h1>
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
                <!--<li><a href="/user/home/">个人中心</a>></li>-->
                <li>History</li>
            </ul>
        </div>
    </section>

<section>
	<div class="wp list personal_list">
	<div class="left">
        <ul>
            <li class="active2"><a href="history.php">Logs</a></li>
        </ul>
	</div>

    
    <div class="right">
		<div class="personal_des ">
			<div class="head" style="border:1px solid #eaeaea;">
				<h1>Logs</h1>
			</div>
			<div class="inforcon">
				<div class="left" style="width:242px;">
                    <iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
                    <form class="clearfix" id="jsAvatarForm" enctype="multipart/form-data" autocomplete="off" method="post" action="/users/image/upload/" target='frameFile'>
                        <label class="changearea" for="avatarUp">
                            <span id="avatardiv" class="pic">
                                <img width="100" height="100" class="js-img-show" id="avatarShow" src="../media/image/2016/12/default_big_14.png"/>
                            </span>
                           
                        </label>
                        <input type='hidden' name='csrfmiddlewaretoken' value='799Y6iPeEDNSGvrTu3noBrO4MBLv6enY' />
                    </form>
				</div>
				
                <!--   ------------------------------user log form--------------------------------  -->
                
                <form class="perinform" id="jsEditUserForm" name="info_form" autocomplete="off">
					<ul class="right">
						
                    <?php
                    $log_query = "SELECT * FROM User_log where login_name = '$user_name' order by time desc";
                    $log = mysqli_query($dbc,$log_query);
                    if(mysqli_num_rows($log)>0){
                        while($rows=mysqli_fetch_assoc($log)){
                                    $logcontent = $rows["info"];
                                    $time = $rows["time"];
                                    echo'<li>';
                                    echo $time;
                                    echo'<input style="width:520px;" type="text" name="log_name" value="';
                                    echo $logcontent;
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