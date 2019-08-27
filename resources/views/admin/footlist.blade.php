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
<form method="post" action="" id="listform">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 导航栏内容列表</strong> <a href="" style="float:right;
        display:none;">添加字段</a></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li> <a class="button border-main icon-plus-square-o" href="/admin/footadd">
                        添加友情链接</a> </li>
                <a class="button button-little bg-red" href="/admin/index" target="_blank">
                    <span class="icon-home"></span> 后台首页
                </a> &nbsp;&nbsp;
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="100" style="text-align:left; padding-left:20px;">ID</th>
                <th width="10%">排序</th>
                <th>名称</th>
                <th>URL</th>
                <th width="10%">更新时间</th>
                <th width="310">操作</th>
            </tr>
            @foreach($res as $k=>$v)
                <tr>
                    <td>{{$v['f_id']}}</td>
                    <td>{{$v['details']}}</td>
                    <td>{{$v['f_name']}}</td>
                    <td>{{$v['f_url']}}</td>
                    <td>{{$v['created_at']}}</td>
                    <td><div class="button-group">
                            <a class="button border-main" href="{{route('edittestf',['f_id'=>$v->f_id])}}"><span class="icon-edit"></span> 修改</a>
                            <a class="button border-red" href="footdel?f_id={{$v->f_id}}" onclick="return del(1, 1,1)
                            "><span class="icon-trash-o"></span> 删除</a>
                        </div>
                    </td>
                </tr>
            @endforeach


            <tr>
                <td colspan="8"><div class="pagelist"> {{$res->appends($request)->links()}}</div></td>
            </tr>
        </table>
    </div>
</form>

</body>
</html>