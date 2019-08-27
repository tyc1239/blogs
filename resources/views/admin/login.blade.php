<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>  
    <link rel="stylesheet" href="../css/pintuer.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/pintuer.js"></script>
</head>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">           
            </div>         



                <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="u_name" placeholder="登录账号" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="u_pwd" placeholder="登录密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                </div>
                <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big"
                                                  id="sub" value="登录"></div>
            </div>
            <div style="padding:30px;"><a href="http://www.blogs.com/admin/reg">免费注册</a>
                <a href="http://www.blogs.com/admin/forget">忘记密码</a>
            </div>

        </div>

        </div>
    </div>
</div>

</body>
</html>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
    $('#sub').click(function(){
        var u_name = $('input[name=u_name]').val();
       // alert(u_name);exit;
        var u_pwd = $('input[name=u_pwd]').val();
        $.ajax({
            url:'/admin/logindo',
            type:'GET',
            data:{u_pwd:u_pwd,u_name:u_name},
            success:function(res){
                 // console.log(res);
               if(res.code==200){
                    localStorage.setItem('token',res.data.token);
                   alert(res.msg);
                    location.href = '/admin/index';
                }else if(res.code==100){
                    alert(res.msg);
                    history.go(0);
                }
            },
            dataType:'json'
        })
    })


</script>
