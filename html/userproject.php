<?php
session_start();
$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
$user_name = $_GET['name'];

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<title><? echo $user_name; ?>'s Projects</title>
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
            <h1><? echo $user_name; ?>'s Projects</h1>
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
                <li><? echo $user_name; ?>'s Projects</li>
            </ul>
        </div>
    </section>

<section>
	<div class="wp list personal_list">
	<div class="left">
        <ul>
            <li ><a style="font-size:14px" href="userinfo.php?name=<? echo $user_name; ?>">Information</a></li>
            <li class="active2"><a style="font-size:14px"><? echo $user_name; ?>'s Projects</a></li>
        </ul>
	</div>

    
    <!--   ------------------------------user projects form--------------------------------  -->
    <div class="right" >
		<div class="personal_des Releasecont">
			<div class="head">
				<h1><? echo $user_name; ?>'s Projects</h1>
			</div>
		</div>
		<div class="personal_des permessage">
			<div class="companycenter">
			 <div class="group_list brief">
                <?php
                $project_query = "SELECT * FROM Projects WHERE login_name = '$user_name'";
                $project = mysqli_query($dbc,$project_query);
                
                if(mysqli_num_rows($project)>0){
                    while($rows=mysqli_fetch_assoc($project)){
                        $proid = $rows["proid"];
                        $like_query = "SELECT COUNT(*) AS num FROM `Like` WHERE proid = '$proid'";
                        $like = mysqli_fetch_array(mysqli_query($dbc,$like_query));
                        $var_like = $like['num'];

                        echo'<div class="module1_5 box">';
                        echo'<a href="project-detail.php?proid=';
                        echo $proid;
                        echo'"><img width="214" height="190" class="scrollLoading" src="../media/beard/ZARD.jpg"/></a>';
               
                        
                        echo'<div class="des">';
                        echo'<a href="project-detail.php?proid=';
                        echo $proid;
                        echo'"><h2>';
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
                ?>


            </div>
		</div>
	</div>
    </div>
    <!--   ------------------------------user projects form--------------------------------  -->

</section>


<!--sidebar start-->
<section>
    <ul class="sidebar">
        <li class="totop"></li>
    </ul>
</section>
<!--sidebar end-->

<!--header start-->
<div class="dialog" id="jsDialog">
    <div class="successbox dialogbox" id="jsSuccessTips">
        <h1>成功提交</h1>
        <div class="close jsCloseDialog"><img src="../images/dig_close.png"/></div>
        <div class="cont">
            <h2>您的需求提交成功！</h2>
            <p></p>
        </div>
    </div>
    <!--提示弹出框-->
    <div class="bidtips dialogbox promptbox" id="jsComfirmDialig">
        <h1>确认提交</h1>
        <div class="close jsCloseDialog"><img src="../images/dig_close.png"/></div>
        <div class="cont">
            <h2>您确认提交吗？</h2>
            <dd class="autoTxtCount">
                <div class="button">
                    <input type="button" class="fl half-btn" value="确定" id="jsComfirmBtn"/>
                    <span class="fr half-btn jsCloseDialog">取消</span>
                </div>
            </dd>
        </div>
    </div>
    <div class="resetpwdbox dialogbox" id="jsResetDialog">
        <h1>修改密码</h1>
        <div class="close jsCloseDialog"><img src="../images/dig_close.png"/></div>
        <div class="cont">
            <form id="jsResetPwdForm" autocomplete="off">
                <div class="box">
                    <span class="word2" >新&nbsp;&nbsp;密&nbsp;&nbsp;码</span>
                    <input type="password" id="pwd" name="password1" placeholder="6-20位非中文字符"/>
                </div>
                <div class="box">
                    <span class="word2" >确定密码</span>
                    <input type="password" id="repwd" name="password2" placeholder="6-20位非中文字符"/>
                </div>
                <div class="error btns" id="jsResetPwdTips"></div>
                <div class="button">
                    <input id="jsResetPwdBtn" type="button" value="提交" />
                </div>
                <input type='hidden' name='csrfmiddlewaretoken' value='DaP7IUKm9FA9nELA9YUlYYWpyIDdCiIP' />
            <input type='hidden' name='csrfmiddlewaretoken' value='799Y6iPeEDNSGvrTu3noBrO4MBLv6enY' />
            </form>
        </div>
    </div>
    <div class="dialogbox changeemai1 changephone" id="jsChangeEmailDialog">
        <h1>修改邮箱</h1>
        <div class="close jsCloseDialog"><img src="../images/dig_close.png"/></div>
        <p>请输入新的邮箱地址</p>
        <form id="jsChangeEmailForm" autocomplete="off">
            <div class="box">
                <input class="fl change_email" name="email" id="jsChangeEmail" type="text" placeholder="输入重新绑定的邮箱地址">
            </div>
            <div class="box">
                <input class="fl email_code" type="text" id="jsChangeEmailCode" name="code" placeholder="输入邮箱验证码">
                <input class="getcode getting" type="button" id="jsChangeEmailCodeBtn" value="获取验证码">
            </div>
            <div class="error btns change_email_tips" id="jsChangeEmailTips" >请输入...</div>
            <div class="button">
                <input class="changeemai_btn" id="jsChangeEmailBtn" type="button" value="完成"/>
            </div>
            <input type='hidden' name='csrfmiddlewaretoken' value='DaP7IUKm9FA9nELA9YUlYYWpyIDdCiIP' />
        <input type='hidden' name='csrfmiddlewaretoken' value='799Y6iPeEDNSGvrTu3noBrO4MBLv6enY' />
        </form>
    </div>

    <div  class="noactivebox dialogbox" id="jsUnactiveForm" >
        <h1>邮件验证提示</h1>
        <div class="close jsCloseDialog"><img src="../images/dig_close.png"/></div>
        <div class="center">
            <img src="../images/send.png"/>
            <p>我们已经向您的邮箱<span class="green" id="jsEmailToActive">12@13.com</span>发送了邮件，<br/>为保证您的账号安全，请及时验证邮箱</p>
            <p class="a"><a class="btn" id="jsGoToEmail" target="_blank" href="http://mail.qq.com">去邮箱验证</a></p>
            <p class="zy_success upmove"></p>
            <p style="display: none;" class="sendE2">没收到，您可以查看您的垃圾邮件和被过滤邮件，也可以再次发送验证邮件（<span class="c5c">60s</span>）</p>
            <p class="sendE">没收到，您可以查看您的垃圾邮件和被过滤邮件，<br/>也可以<span class="c5c green" id="jsSenEmailAgin" style="cursor: pointer;">再次发送验证邮件</span></p>
        </div>
    </div>
    <div class="resetpassbox dialogbox" id="jsSetNewPwd">
        <h1>重新设置密码</h1>
        <div class="close jsCloseDialog"><img src="../images/dig_close.png"/></div>
        <p class="green">请输入新密码</p>
        <form id="jsSetNewPwdForm">
            <div class="box">
                <span class="word2">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</span>
                <input type="password" name="password" id="jsResetPwd" placeholder="请输入新密码"/>
            </div>
            <div class="box">
                <span class="word2">确&nbsp;认&nbsp;密&nbsp;码</span>
                <input type="password" name="password2" id="jsResetPwd2" placeholder="请再次输入新密码"/>
            </div>
            <div class="box">
                <span class="word2">验&nbsp;&nbsp;证&nbsp;&nbsp;码</span>
                <input type="text" name="code" id="jsResetCode" placeholder="请输入手机验证码"/>
            </div>
            <div class="error btns" id="jsSetNewPwdTips"></div>
            <div class="button">
                <input type="hidden" name="mobile" id="jsInpResetMobil" />
                <input id="jsSetNewPwdBtn" type="button" value="提交" />
            </div>
            <input type='hidden' name='csrfmiddlewaretoken' value='DaP7IUKm9FA9nELA9YUlYYWpyIDdCiIP' />
        </form>
    </div>
    <div class="forgetbox dialogbox">
        <h1>忘记密码</h1>
        <div class="close jsCloseDialog"><img src="../images/dig_close.png"/></div>
        <div class="cont">
            <form id="jsFindPwdForm" autocomplete="off">
                <input type='hidden' name='csrfmiddlewaretoken' value='DaP7IUKm9FA9nELA9YUlYYWpyIDdCiIP' />
                <div class="box">
                    <span class="word2" >账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号</span>
                    <input type="text" id="account" name="account" placeholder="手机/邮箱"/>
                </div>
                <div class="box">
                    <span class="word3">验证码</span>
                    <input autocomplete="off" class="form-control-captcha find-password-captcha" id="find-password-captcha_1" name="captcha_f_1" placeholder="请输入验证码" type="text" /> <input class="form-control-captcha find-password-captcha" id="find-password-captcha_0" name="captcha_f_0" placeholder="请输入验证码" type="hidden" value="5f3c00e47fb1be12d2fd15b9a860711597721b3f" /> &nbsp;<img src="/captcha/image/5f3c00e47fb1be12d2fd15b9a860711597721b3f/" alt="captcha" class="captcha" />
                </div>
                <div class="error btns" id="jsForgetTips"></div><!--忘记密码错误-->
                <div class="button">
                    <input type="hidden" name="sms_type" value="1">
                    <input id="jsFindPwdBtn" type="button" value="提交" />
                </div>
            </form>
        </div>
    </div>
</div>
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
