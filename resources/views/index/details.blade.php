<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
  <title>类友网络-动态详情页</title>
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
          <!-- <li class="layui-nav-item layui-this"><a href="http://www.tyczxy.top/index/index">首页</a></li>
          <li class="layui-nav-item"><a href="http://www.tyczxy.top/index/product">产品</a></li>
          <li class="layui-nav-item"><a href="http://www.tyczxy.top/index/news">动态</a></li>
          <li class="layui-nav-item"><a href="http://www.tyczxy.top/index/casea">案例</a></li>
          <li class="layui-nav-item"><a href="http://www.tyczxy.top/index/about">关于</a></li> -->
           @foreach($native as $k=>$v)
            <li class="layui-nav-item layui-this"><a href="{{$v->n_url}}">{{$v->n_name}}</a></li>
           @endforeach
        </ul>
      </div>
    </div>
  </div>
  <!-- main部分 -->
  <div class="main-newsdate">
    <div class="layui-container">
      <p class="news"><a href="/index/news">实时新闻</a> > 新闻详情</p>
      <h1>这家引爆ins的奶茶店终于空降南昌，开放加盟啦！</h1>
      <p class="pushtime">发布时间：<span>2018-06-06</span></p>
      <p class="introTop">TA家的珍珠是用黑糖熬制的，要熬整整四个小时才行，每熬一锅黑糖只能做出40杯奶茶，好味，是值得等待的。</p>
      <div><img src="../res/static/img/news_big.jpg" alt="新闻详情图"></div>
      <p class="introBott">北极光的制作，需要300g葡萄来完成，要选用最新鲜的葡萄，才能做出最灿烂的北极光。满满一瓶葡萄，看着就让人倍感满足。喝之前，要先摇9下，才能喝出最好的果味。晨曦的寓意是，清晨的阳光。要用到一整颗百香果的晨曦，喝起来酸酸甜甜，果味浓郁。晨曦喝起来果味极浓，不仅仅有百香果，还有芒果、橙汁...的味道，十分清新，彷佛夏日的一抹凉风！</p>
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