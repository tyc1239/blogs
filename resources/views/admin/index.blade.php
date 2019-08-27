<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理</title>
    <link rel="stylesheet" href="../css/pintuer.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="../images/y.png" class="radius-circle rotate-hover" height="50" alt="" />后台数据管理</h1>
  </div>
  <div class="head-l">
	  	<a class="button button-little bg-green" href="/index/index" target="_blank">
	  		<span class="icon-home"></span> 前台首页
	  	</a> &nbsp;&nbsp;

	  <a class="button button-little bg-red"   target="_blank" id="outlogin">
		  <span class="icon-power-off"></span> 退出登录
	  </a> &nbsp;&nbsp;
	 	{{--<button  ><span class="icon-power-off button button-little bg-red"></span> </button>--}}

  	</div>
</div>
<div class="leftnav">
  	<div class="leftnav-title">
  		<strong>
  			<span class="icon-list"></span>前台内容管理
  		</strong>
  	</div>

	<h2><span class="icon-pencil-square-o"></span>轮播图管理</h2>
	<ul>
	    <li>
	    	<a href="/admin/slideadd" target="right">
	    		<span class="icon-caret-right"></span>轮播图添加 
	    	</a>
	    </li>
		<li>
			<a href="/admin/slidelist" target="right">
				<span class="icon-caret-right"></span>轮播图展示
			</a>
		</li>
	     
	</ul>
	<h2><span class="icon-pencil-square-o"></span>导航栏管理</h2>
	<ul>
	    <li>
	    	<a href="/admin/nativeadd" target="right">
	    		<span class="icon-caret-right"></span>导航栏添加
	    	</a>
	    </li>
	    <li>
	    	<a href="/admin/nativelist" target="right">
	    		<span class="icon-caret-right"></span>导航栏展示
	    	</a>
	    </li>
	</ul>
	<h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
	<ul>
		<li>
			<a href="/admin/columnadd" target="right">
				<span class="icon-caret-right"></span>栏目添加
			</a>
		</li>
		<li>
			<a href="/admin/columnlist" target="right">
				<span class="icon-caret-right"></span>栏目列表展示
			</a>
		</li>
		<li>
			<a href="/admin/detailsadd" target="right">
				<span class="icon-caret-right"></span>栏目列表详情添加
			</a>
		</li>
		<li>
			<a href="/admin/detailslist" target="right">
				<span class="icon-caret-right"></span>栏目列表详情展示
			</a>
		</li>

	</ul>
	<h2><span class="icon-pencil-square-o"></span>底部链接管理</h2>
	<ul>
		<li>
			<a href="/admin/footadd" target="right">
				<span class="icon-caret-right"></span>链接地址添加
			</a>
		</li>
		<li>
			<a href="/admin/footlist" target="right">
				<span class="icon-caret-right"></span>链接地址展示
			</a>
		</li>


	</ul>
</div>

<script type="text/javascript">
$(function(){
   $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
 	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
 	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
   })
});
</script>




<div style="text-align:right;">
<!-- 	<p> <img src="../res/static/img/123.png"></p>
 -->
</div>


</body>
</html>
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script>
	$('#outlogin').click(function(){

		//alert(1234567);
		$.ajax({
			url:"/admin/outlogin",
			dataType:'json',
			success:function(res){
				if(res.code==1){
					alert('退出成功');
					location.href="/admin/login";
				}
			}
		});
	});
</script>