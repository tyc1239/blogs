<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="../css/pintuer.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-key"></span> 修改管理员密码</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="">
            <div class="form-group">
                <div class="label">
                    <label for="sitename">注册手机号：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="u_email" name="u_email" size="50" placeholder="请输入注册的手机号"/>
                    <input type="button" class="btn" value="发送验证码" id="send">
                </div>

                <div class="label">
                    <label for="sitename">验证码：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="code" name="code" size="50" placeholder="请输入验证码"/>
                </div>


            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">新密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" id="u_pwd" name="u_pwd" size="50" placeholder="请输入新密码"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">确认新密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" id="u_pwds" name="u_pwds" size="50" placeholder="请再次输入新密码"/>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <input id="btn" type="button" value="修改" />
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script>

    $(function(){
        $('#send').click(function(){

            var u_email=$('#u_email').val();
            var send=$('#send').val();

            // console.log(tel);return;
            reg=/^1[3456789]\d{9}$/;
            if(u_email==''){
                alert("手机号不能为空");
                return false;
            }else if(!(reg.test(u_email))){
                alert("手机号格式有误");
                return false;
            }

            $.post({
                url:"/admin/send",
                data:{u_email:u_email},
                dataType:'json',
                success:function(res){
                    console.log(res);
                }
            });

//            function daojishi(seconds,obj) {
//                if (seconds > 1) {
//                    seconds--;
//                    $(obj).val(seconds + "秒后可重新获取 ").attr("disabled", true);//禁用按钮
//                    // 定时1秒调用一次
//                    setTimeout(function () {
//                        daojishi(seconds, obj);
//                    }, 1000);
//                } else {
//                    $(obj).val("免费获取验证码").attr("disabled", false);//启用按钮
//                }
//            }
        });

        $('#btn').click(function(){
            var u_email=$('#u_email').val();
            var u_pwd=$('#u_pwd').val();
            var u_pwds=$('#u_pwds').val();
            var code=$('#code').val();
            reg=/^1[3456789]\d{9}$/;
            // console.log(tel);return;

            if(u_email==''){
                alert("手机号不能为空");
                return false;
            }else if(!(reg.test(u_email))){
                alert("手机号格式有误");
                return false;
            }
            if(code==''){
                alert('验证码不能为空');
                return false;
            }

            if(u_pwd==''){
                alert('重置密码不能为空');
                return false;
            }

            if(u_pwds==''){
                alert('确认密码不能为空');
                return false;
            }else if(u_pwd !=u_pwds){
                alert('重置密码与确认密码不一致');
                return false;
            }

            $.post({
                url:"/admin/forgetdo",
                data:{u_email:u_email,code:code,u_pwd:u_pwd,u_pwds:u_pwds},

                success:function(res){
                //     console.log(res);
                    if(res.code==1){
                        alert(res.msg);
                        location.href="/admin/login";
                    }

                },
                dataType:'json'

            })

        })
    })


</script>
