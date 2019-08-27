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
  <div class="panel-head"><strong class="icon-reorder"> 轮播图内容列表</strong></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li> <a class="button border-main icon-plus-square-o" href="/admin/slideadd">
                        添加轮播图内容</a> </li>
                <a class="button button-little bg-red" href="/admin/index" target="_blank">
                    <span class="icon-home"></span> 后台首页 
                </a> &nbsp;&nbsp;
            </ul>
        </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="20%">栏目图片</th>
      
      <th width="15%">导航栏名称</th>
       
      <th width="20%">操作</th>
    </tr>
    <!-- <?php $num=1;?> -->
    @foreach($data as $key=>$val)
    <tr>
     <!-- <td>{{$num++}}</td>     -->
      <td>{{$val->s_id}}</td>     
      <td><img src="/blogs/{{$val->s_img}}" width="100"></td>      
       
      <td>{{$val->s_desc}}</td>
        
       
      <td><div class="button-group">
      
      <a class="button border-red" href="slidedel?s_id={{$val->s_id}}" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
  @endforeach
    
  </table>
   <center>{{$data->appends($query)->links()}}</center>
</div>
 
</body></html>