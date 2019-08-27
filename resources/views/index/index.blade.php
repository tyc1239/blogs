<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
  <title>首页</title>
  <link rel="stylesheet" href="../res/layui/css/layui.css">
  <link rel="stylesheet" href="../res/static/css/index.css">
</head>
<body>
  <!-- nav部分 -->
  <div class="nav index">
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
  <div>
    <div class="layui-carousel" id="banner">
      <div carousel-item>
       @foreach($slide as $k=>$v)
        <div>
            <center><img src="/blogs/{{$v->s_img}}"></center>
         <div class="panel">
            <p class="title">类友网络</p>
            <p>完美前端体验</p>
          </div>
        </div>
       @endforeach
      </div>
    </div>
  </div>
  <!-- main部分 -->
  <div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
  <div class="main-product">
    <div class="layui-container">
      <p class="title"><span>专为</span>PHP<span>而研制的核心产品</span></p>
      <div class="layui-row layui-col-space25">
       @foreach($column as $k=>$v)
        <div class="layui-col-sm6 layui-col-md3">
        
          <div class="content">
       

            <div><img src="/blogs/{{$v->c_img}}"></div>
            <div>
              <p class="label">{{$v->c_name}}</p>
              <p>{{$v->c_descs}}</p>
            </div>

            <!-- <a href="javascript:;">查看产品 ></a> -->
      
          </div>
           
        </div>
@endforeach
    </div>
  </div>
  <div class="main-service">
    <div class="layui-container">
      <p class="title">专业服务<span></span></p>
      <div class="layui-row layui-col-space25 layui-col-space80">
       @foreach($column1 as $k=>$v)
        <div class="layui-col-sm6">
          <div class="content">
            <div class="content-left"><img src="/blogs/{{$v->c_img}}"></div>
            <div class="content-right">
         
              <p class="label">{{$v->c_name}}</p>
              <span></span>
              <p>{{$v->c_descs}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="service-more"><a href="/admin/index">后台展示请点击</a></div>
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
              <p class="contact-top"><i class="layui-icon layui-icon-cellphone"></i>&nbsp;13811636991</p>
              <p class="contact-bottom"><i class="layui-icon layui-icon-home"></i>&nbsp;tyc1239@163.com</span></p>
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