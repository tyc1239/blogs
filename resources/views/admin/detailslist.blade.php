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
    <div class="padding border-bottom">
  <div class="panel-head"><strong class="icon-reorder"> 栏目详情列表</strong></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
             <a class="button button-little bg-red" href="/admin/index" target="_blank">
                    <span class="icon-home"></span> 返回后台首页 
                </a> &nbsp;&nbsp;
                <li> <a class="button border-main icon-plus-square-o" href="/admin/detailsadd">
                        添加栏目详情内容</a> </li>  
        <li>
           
        </li>

            
      </ul>
        </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">栏目详情图片</th>
      <th width="10%">栏目详情名称</th>
      <th width="20%">栏目详情内容</th>
       <th width="15%">详情添加时间</th>
      <th width="10%">操作</th>
    </tr>
    @foreach($data as $key=>$val)
    <tr id="tr">
      <td>{{$val->d_id}}</td>     
      <td><img src="/blogs/{{$val->d_img}}" width="100"></td>      
      <td>{{$val->d_name}}</td>
      <td>{{$val->d_desc}}</td>
        <td>{{$val->created_at}}</td>
      <td><div class="button-group">
      <a class="button border-main" href="{{route('edittestd',['d_id'=>$val->d_id])}}"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="detailsdel?d_id={{$val->d_id}}" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
  @endforeach
    
  </table>
   <center>{{$data->appends($query)->links()}}</center> 
</div>
 
</body></html>
