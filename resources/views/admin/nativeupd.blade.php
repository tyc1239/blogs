<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="/css/pintuer.css">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改导航栏信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="{{url('admin/nativeupddo/'.$data->n_id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="label">
                    <label>导航名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="{{$data->n_name}}" name="n_name" data-validate="required:请修改标题" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>URL：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="{{$data->n_url}}" name="n_url" data-validate="required:请输入url链接地址!" />
                    <div class="tips"></div>
                </div>
            </div>



            <div class="form-group">
                <div class="label">
                    <label>选择级别：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="{{$data->details}}" name="details" data-validate="required:" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>

                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>