<?php
session_start();

$dbc = mysqli_connect('127.0.0.1','root','2012211338','Project');
$user_name = $_GET['name'];

$info_query = "SELECT * FROM User WHERE login_name = '$user_name'";
$info = mysqli_fetch_array(mysqli_query($dbc,$info_query));

$var_loginname = $info["login_name"];
$var_name = $info["name"];
$var_phonenum = $info["phonenum"];
$var_interests = $info["interests"];


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
	<title><? echo $user_name; ?></title>
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
            <h1><? echo $user_name; ?>'s Home Page</h1>
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
                <li>Information</li>
            </ul>
        </div>
    </section>

<section>
	<div class="wp list personal_list">
	<div class="left">
        <ul>
            <li class="active2"><a style="font-size:14px">Information</a></li>
            <li ><a href="userproject.php?name=<? echo $user_name; ?>" style="font-size:14px"><? echo $user_name; ?>'s Projects</a></li>
        </ul>
	</div>

    
    <div class="right">
		<div class="personal_des ">
			<div class="head" style="border:1px solid #eaeaea;">
				<h1>Information</h1>
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
                    <!--<div style="border-top:1px solid #eaeaea;margin-top:30px;">
                        <a class="button btn-green btn-w100" id="jsUserResetPwd" style="margin:80px auto;width:100px;">Change Password</a>
                    </div>-->
				</div>
				
                <!--   ------------------------------user information form--------------------------------  -->
                
                <form class="perinform" id="jsEditUserForm" name="info_form" autocomplete="off">
					<ul class="right">
						<li>LoginName<input type="text" id="login_name" name="login_name" value="<? echo $user_name; ?>" readonly="readonly"/>
                        </li>

                        <li>Real Name&nbsp;<input type="text" id="name" name="name" value="<? echo $var_name; ?>" maxlength="20" readonly="readonly"/>
                        </li>
						
                        <li>Phone Num<input type="text" id="phonenum" name="phonenum" value="<? echo $var_phonenum; ?>" readonly="readonly"/>
                        </li>

                        
                        <li>Interests&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="interests" name="interests" value="<? echo $var_interests; ?>" readonly="readonly"/>
                        </li>
						

					</ul>
                    
				</form>
                <!--   ------------------------------user information form--------------------------------  -->

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
