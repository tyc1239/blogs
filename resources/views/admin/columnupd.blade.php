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


<div class="panel admin-panel margin-top" id="add">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改栏目内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="{{url('admin/columnupddo/'.$data->c_id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="label">
                    <label>栏目标题：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="{{$data->c_name}}" name="c_name" data-validate="required:请输入栏目标题" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>栏目图片：</label>
                </div>
                <div class="field">

                    {{--<input type="file" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""--}}
                    {{--data-toggle="hover" data-place="right" data-image="" />--}}
                    <img src="http://blogs.com/{{$data->c_img}}" width="100px">
                    <input type="file" name="edit_img">
                    <input type="hidden" name="c_img" value="{{$data->c_img}}">
                    {{--<input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">--}}
                    {{--<div class="tipss">图片尺寸：500*200</div>--}}

                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>导航栏名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="c_desc" style="" value="{{$data->c_desc}}"> 
                    <div class="tips"></div>
                </div>
            </div>

             <div class="form-group">
                <div class="label">
                    <label>栏目详情：</label>
                </div>
                <div class="field">
                  
                     <textarea type="text" class="input" name="c_descs" style="height:300px;width:500px;" value="{{$data->c_descs}}">{{$data->c_descs}}</textarea>
                    <div class="tips"></div>
                </div>
            </div>
           <!--  <div class="form-group">
                <div class="label">
                    <label>选择分类：</label>
                </div>
                <div class="field">
                    <select name="c_id" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
                         
                        @foreach($datan as $k=>$v)
                            <option value="{{$v->n_id}}">{{$v->n_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
 -->
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>