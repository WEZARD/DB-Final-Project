<?php
session_start();



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
                                <dd>bobby<img class="down fr" src="../images/top_down.png"/></dd>
                                <dt><img width="20" height="20" src="../media/image/2016/12/default_big_14.png"/></dt>
                            </dl>
                            <div class="userdetail">
                            	<dl>
	                                <dt><img width="80" height="80" src="../media/image/2016/12/default_big_14.png"/></dt>
	                                <dd>
	                                    <h2>django</h2>
	                                    <p>bobby</p>
	                                </dd>
                                </dl>
                                <div class="btn">
	                                <a class="personcenter fl" href="usercenter-info.html">进入个人中心</a>
	                                <a class="fr" href="/logout/">退出</a>
                                </div>
                            </div>
                        </div>
                        <a href="usercenter-message.html">
                            <div class="msg-num"> <span id="MsgNum">0</span></div>
                        </a>
                    


				</div>
			</div>

            <div class="middle">
                <div class="wp">
                    <a href="index.html"><img class="fl" src="../images/logo.jpg"/></a>
                    <div class="searchbox fr">
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
                    </div>
                </div>
            </div>
            
            
			<nav>
				<div class="nav">
					<div class="wp">
						<ul>
							<li ><a href="index.html">Search</a></li>
							<li class="active">
								<a href="course-list.html">
									Project<img class="hot" src="../images/nav_hot.png">
								</a>
							</li>
							<li >
								<a href="teachers-list.html">Follow</a>
							</li>
							<li ><a href="org-list.html">Profile</a></li>
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
                <li><a href="index.html">Page</a>></li>
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
						<li class="active"><a href="?sort=">最新 </a></li>
						<li ><a href="?sort=hot">最热门</a></li>
						<li ><a href="?sort=students">参与人数</a></li>
					</ul>
				</div>
                
                <div id="inWindow">
                    <div class="tab_cont " id="content">
					<div class="group_list">
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/12/mysql.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>xadmin进阶开发</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">30</i></span>
                                    <span class="fr">学习人数：2&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自慕课网</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        1
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/12/57035ff200014b8a06000338-240-135_dHfj8Nq.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>scrapy教程</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">55</i></span>
                                    <span class="fr">学习人数：0&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自北京大学</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        1
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/12/python错误和异常.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>python错误和异常</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：0&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自慕课网</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/12/python面向对象.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>python面向对象</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：1&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自北京大学</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/11/540e57300001d6d906000338-240-135_n0L8vbw.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>django与vuejs实战项目2</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：12&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自北京大学</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/12/python文件处理.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>python文件处理</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：2&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自北京大学</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/11/540e57300001d6d906000338-240-135_mvvGYHL.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>django实战项目</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：0&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自慕课网</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/11/57035ff200014b8a06000338-240-135_dHfj8Nq.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>java入门2</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：0&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自慕课网2</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/11/57035ff200014b8a06000338-240-135_0nFiBSI.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>java入门3</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：1&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自慕课网3</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/11/540e57300001d6d906000338-240-135_MSIqfvw.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>python入门2</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：0&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自慕课网666</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/11/540e57300001d6d906000338-240-135.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>python入门</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">0</i></span>
                                    <span class="fr">学习人数：0&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自南京大学</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        
                            <div class="box">
                                <a href="course-detail.html">
                                    <img width="280" height="350" class="scrollLoading" src="../media/courses/2016/11/57035ff200014b8a06000338-240-135.jpg"/>
                                </a>
                                <div class="des">
                                    <a href="course-detail.html">
                                        <h2>java入门</h2>
                                    </a>
                                    <span class="fl">时长：<i class="key">20</i></span>
                                    <span class="fr">学习人数：0&nbsp;&nbsp;</span>
                                </div>
                                <div class="bottom">
                                    <a href="course-detail.html"><span class="fl">来自北京大学</span></a>
                                    <span class="star fr  notlogin
                                        " data-favid="15">
                                        0
                                    </span>
                                </div>
                            </div>
                        


					</div>
                    <div class="pageturn">
                        <ul class="pagelist">
                            

                            
                                
                                    
                                        <li class="active"><a href="?page=1">1</a></li>
                                    
                                
                            
                                
                                    
                                        <li><a href="?page=2" class="page">2</a></li>
                                    
                                
                            
                            
                                <li class="long"><a href="?page=2">下一页</a></li>
                            

                        </ul>
                    </div>
				</div>
                </div>
			</div>
			<div class="right layout">
				<div class="head">热门课程推荐</div>
				<div class="group_recommend">
                    
                    <dl>
						<dt>
							<a target="_blank" href="">
								<img width="240" height="220" class="scrollLoading" src="../media/courses/2016/11/540e57300001d6d906000338-240-135_n0L8vbw.jpg"/>
							</a>
						</dt>
						<dd>
							<a target="_blank" href=""><h2> django与vuejs实战项目2</h2></a>
							<span class="fl">难度：<i class="key">高级</i></span>
						</dd>
					</dl>
                    
                    <dl>
						<dt>
							<a target="_blank" href="">
								<img width="240" height="220" class="scrollLoading" src="../media/courses/2016/12/python面向对象.jpg"/>
							</a>
						</dt>
						<dd>
							<a target="_blank" href=""><h2> python面向对象</h2></a>
							<span class="fl">难度：<i class="key">中级</i></span>
						</dd>
					</dl>
                    
                    <dl>
						<dt>
							<a target="_blank" href="">
								<img width="240" height="220" class="scrollLoading" src="../media/courses/2016/12/python文件处理.jpg"/>
							</a>
						</dt>
						<dd>
							<a target="_blank" href=""><h2> python文件处理</h2></a>
							<span class="fl">难度：<i class="key">中级</i></span>
						</dd>
					</dl>
                    


				</div>
			</div>
		</div>
	</div>
</section>

<footer>
		<div class="footer">
			<div class="wp">
				<ul class="cont">
					<li class="logo"><a href=""><img src="../images/footlogo.png"/></a></li>
					<li class="code"><img src="../images/code.jpg"/><p class="center">扫描关注微信</p></li>
					<li class="third"><img class="fl" src="../images/tell.png"/><p class="tell">33333333</p><p class="time">周一至周日 9:00-18:00</p></li>
				</ul>

			</div>
			<p class="line"></p>
			<div class="wp clear">
                <span class="fl">? 2016 www.projectsedu.com 慕学在线-在线学习交流平台 保留所有权利</span>
                <span class="fr">copyright ? 2016 ICP备案证书号：蜀ICP备xxxxx号-1</span>
			</div>
		</div>
	</footer>

<section>
    <ul class="sidebar">
        <li class="qq">
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2023525077&site=qq&menu=yes"></a>
        </li>
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
