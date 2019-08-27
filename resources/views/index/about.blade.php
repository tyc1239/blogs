<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
  <title>类友网络-关于</title>
  <link rel="stylesheet" href="../res/layui/css/layui.css">
  <link rel="stylesheet" href="../res/static/css/index.css">
</head>
<body>
  <!-- nav部分 -->
  <div class="nav">
    <div class="layui-container">
      <!-- 公司logo -->
      <div class="nav-logo">
        <a href="index.html">
          <img src="../res/static/img/logo.png" alt="类友网络">
        </a>
      </div>
      <div class="nav-list">
        <button>
          <span></span><span></span><span></span>
        </button>
        <ul class="layui-nav" lay-filter="">
           
          @foreach($native as $k=>$v)
            <li class="layui-nav-item layui-this"><a href="{{$v->n_url}}">{{$v->n_name}}</a></li>
           @endforeach
        </ul>
      </div>
    </div>
  </div>
  <!-- banner部分 -->
  <div class="banner about">
    <div class="title">
      <p>关于我们</p>
      <p class="en">About Us</p>
    </div>
  </div>
  <!-- main部分 -->
  <div class="main-about">
    <div class="layui-container">
      <div class="layui-row">
        <ul class="aboutab">
          <li class="layui-this">公司简介</li><li>招贤纳士</li><li>发展历程</li>
        </ul>
        <div class="tabIntro">
         @foreach($column6 as $k=>$v)
          <div class="content">
            <div class="layui-inline img"><img src="/blogs/{{$v->c_img}}"></div><div class="layui-inline panel">
              <p>{{$v->c_descs}}</p>
            </div>
          </div>
       @endforeach
        </div>
        <div class="tabJob">
        @foreach($column7 as $k=>$v)
          <div class="content">
            <p class="title">{{$v->c_name}}</p>
            <p>> 职位描述</p>
            <ol>
              <li>{{$v->c_descs}}</li>
              <li>熟练掌握PHP后端开发技术，新浪一样的门户网站，淘宝一样的商城系统</li>
            </ol>
          </div>
       @endforeach
        </div>
        <div class="tabCour">
          <p class="title">我们的蜕变</p>
          <ul class="timeline">
            <li class="odd">
              <div class="cour-img"><img src="../res/static/img/us_img4.png"></div>
              <div class="cour-panel layui-col-sm4 layui-col-lg5">
                <p class="label">2017 年 6 月</p>
                <p>我们成立了，来到了杭州西湖这个美丽的地方。</p>
              </div>
            </li>
            <li>
              <div class="cour-img"><img src="../res/static/img/us_img5.png"></div>
              <div class="cour-panel layui-col-sm4 layui-col-sm-offset8 layui-col-lg5 layui-col-lg-offset7">
                <p class="label">2018 年 6 月</p>
                <p>我们来到了北京这个美丽的地方。</p>
              </div>
            </li>
 
            <li class="odd">
              <div class="cour-img"><img src="../res/static/img/us_img8.png"></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- footer部分 -->
  <div class="footer">
    <div class="layui-container">
      <p class="footer-web">
         @foreach($foot as $k=>$v)
            <a href="{{$v->f_url}}">{{$v->f_name}}</a>
          @endforeach
      </p>
      <div class="layui-row footer-contact">
        <div class="layui-col-sm2 layui-col-lg1"><img src="../res/static/img/erweima.jpg"></div>
        <div class="layui-col-sm10 layui-col-lg11">
          <div class="layui-row">
            <div class="layui-col-sm6 layui-col-md8 layui-col-lg9">
              <p class="contact-top"><i class="layui-icon layui-icon-cellphone"></i>&nbsp;400-8888888&nbsp;&nbsp;&nbsp;(9:00-18:00)</p>
              <p class="contact-bottom"><i class="layui-icon layui-icon-home"></i>&nbsp;88888888@163.com</span></p>
            </div>
            <div class="layui-col-sm6 layui-col-md4 layui-col-lg3">
              <p class="contact-top"><span class="right">浙江杭州阿里巴巴西溪园区</span></p>
              <p class="contact-bottom"><span class="right">Copyright&nbsp;©&nbsp;2016-2018&nbsp;&nbsp;ICP&nbsp;备888888号</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="../res/layui/layui.js"></script>
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
  layui.config({
    base: '../res/static/js/' 
  }).use('firm'); 
</script>
</body>
</html>