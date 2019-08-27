<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>注册</title>
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
            <div style="height:80px;"></div>
            <div class="media media-y margin-big-bottom">
            </div>
            <form class="layui-form" action="/admin/regdo" method="post">
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>申请账号</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div >
                            <input type="text"  class="input input-big"  name="u_name" placeholder="请输入用户名称" />

                            <input type="text" data-validate="required:请输入手机号" / class="input input-big" name="u_email" placeholder="请输入手机号" />

                            {{--<input type="text" class="input input-big" name="u_code" placeholder="请输入验证码"/>--}}
                          {{--<button id="yz" style="border-color: #1874CD;--}}
                          {{--background-color:#1874CD">获取验证码</button><span id="spanb"> </span>&nbsp;--}}
                            {{--<input type="submit" class="button button-block bg-main text-big input-big" id="yz"--}}
                                   {{--value="获取验证码">--}}
                            <input type="password" data-validate="required:请输入密码" / class="input input-big" name="u_pwd" placeholder="请输入密码" />
                            <input type="password" data-validate="required:请确认密码" /  class="input input-big" name="u_pwds" placeholder="请确认密码" />
                        </div>
                    </div>

                </div>
                <div style="padding:15px;"><input type="submit" class="button button-block bg-main text-big input-big"id="bt"value="注册"></div>
            </div>
        </form>
        </div>

    </div>
</div>

</body>
</html>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
    //验证邮箱
        $('input[name=u_email]').blur(function(){
        //alert('asdsasd');
        var u_email=$(this).val();
            $(this).next().empty();
            var _this=$(this);
            var reg=/^\w{1,13}$/;
            if (u_email==''){
                $(this).after("<span style='color:red'>手机号不能为空!</span>");
                return false;
            }else if(!reg.test(u_email)){
                $(this).after("<span style='color:red'>请输入正确的手机格式！</span>");
                return false;
            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"/admin/checkemail",
                    method:'post',
                    data:{u_email:u_email},
                    dataType:'json',
                    success:function(res){
                        if(res.code==1){
                            _this.after('<span style="color:red">邮箱已存在</span>')
                        }else if(res.code==2){
                            _this.after('<span style="color:green">邮箱可用</span>')
                        }
                    }
                });
            }
        })

//验证密码
    $('input[name=u_pwd]').blur(function(){
        var u_pwd=$(this).val();
        $(this).next().empty();
        var reg=/^\w{1,6}$/;
        if(u_pwd==''){
            $(this).after("<span style='color:red'>注册密码不能为空!</span>");
            return false;
        }else if(!reg.test(u_pwd)){
            $(this).after("<span style='color:red'>注册密码格式不对!</span>");
            return false;
        }else{
            $(this).after('<span style="color:green">密码可用</span>')
        }
    })
    //验证确认密码
    $('input[name=u_pwds]').blur(function(){
        var u_pwds=$(this).val();
        var u_pwd=$('input[name=u_pwd]').val();
        $(this).next().empty();
        var reg=/^\w{1,6}$/;
        if(u_pwds==''){
            $(this).after("<span style='color:red'>注册重复密码不能为空!</span>");
            return false;
        }else if(!reg.test(u_pwds)){
            $(this).after("<span style='color:red'>注册重复密码格式不对!</span>");
            return false;
        }else if(u_pwd!=u_pwds){
            $(this).after("<span style='color:red'>两次密码不符合!</span>");
            return false;
        }else{
            $(this).after('<span style="color:green">密码可用</span>')
        }
    })

    //获取验证码
    $('#yz').click(function(){
       // alert(1234567);
        var u_email=$('input[name=u_email]').val();
        //alert(u_email);
        $('input[name=u_email]').next().empty();
        if (u_email ==''){
            $('input[name=u_email]').after("<span style='color:red'>注册邮箱不能为空!</span>");
            return false;
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"/admin/send",
            method:'post',
            data:{u_email:u_email},
            dataType:'json',
            success:function(res){
                console.log(res);
               if(res.code==1){
                   alert('邮箱发送成功');
                }else{
                    alert('邮箱发送失败');
                   return false;
                }
            }
        })
    })
    //验证验证码
    $('input[name=u_code]').blur(function(){
//        alert('aa');
        var u_code=$(this).val();
        var reg=/^\d{6}$/;
        $(this).next('spanb').empty();
        if(u_code==''){
            $('#spanb').html("<span style='color:red'>验证码不能为空!</span>");
            return false;
        }else if(!reg.test(u_code)){
            $('#spanb').html("<span style='color:red'>验证码格式不对</span>");
            return false;
        }else{
            $('#spanb').html("<span style='color:green'>√</span>");
        }
    })





</script>