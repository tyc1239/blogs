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
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 单页信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="{{url('admin/detailsupddo/'.$data->d_id)}}"  enctype="multipart/form-data">     
      @csrf 
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="d_name" value="{{$data->d_name}}" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div> 
        <div class="field">
            {{--<input type="file" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""--}}
                    {{--data-toggle="hover" data-place="right" data-image="" />--}}
                    <img src="http://blogs.com/{{$data->d_img}}" width="100px">
                    <input type="file" name="edit_img"> 
                    <input type="hidden" name="d_img" value="{{$data->d_img}}">
                    {{--<input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">--}}
                    {{--<div class="tipss">图片尺寸：500*200</div>--}}

        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
         <input type="text" class="input" name="d_desc" style="height:220px;" value="{{$data->d_desc}}"> 
                  
         
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
</body></html>