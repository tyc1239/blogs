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
  <div class="panel-head"><strong class="icon-reorder" ><a href="/admin/columnlist"> 栏目内容列表</a></strong></div>
        <div class="padding border-bottom">

            <ul class="search" style="padding-left:10px;">
             <a class="button button-little bg-red" href="/admin/index" target="_blank">
                    <span class="icon-home"></span> 后台首页 
                </a> &nbsp;&nbsp;
                <li> <a class="button border-main icon-plus-square-o" href="/admin/columnadd">
                        添加栏目内容</a> </li>  
              <li> <form action="">
            <input type="text"class="input" value="{{$c_name}}" style="width:250px; line-height:17px;display:inline-block" name="c_name" >
            <input type="submit" class="desc button border-main icon-plus-square-o" value="搜索">
        </form></li>
      </ul>
        </div>
       
  <table class="table table-hover text-center " id="sort-table">
  
    <tr>
      <th width="10%">ID</th>
      <th width="20%">栏目图片</th>
      <th width="10%">栏目名称</th>
      <th width="10%">导航栏名称</th>
       <th width="15%">栏目内容</th>
      <th width="20%">操作</th>
    </tr>
    <?php $num=1;?>
    @foreach($data as $key=>$val)
    <tr id="tr">
      <td>{{$num++}}</td>     
      <td><img src="/blogs/{{$val->c_img}}" width="100"></td>      
      <td>{{$val->c_name}}</td>
      <td>{{$val->c_desc}}</td>
        <td>{{$val->c_descs}}</td>
      <td><div class="button-group">
      <a class="button border-main" href="{{route('edittestc',['c_id'=>$val->c_id])}}"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="columndel?c_id={{$val->c_id}}" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
  @endforeach
    
  </table>
   <center>{{$data->appends($query)->links()}}</center>
</div>
 
</body>


 
</html>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../tablesorter/jquery-latest.js"></script>
<script type="text/javascript" src="../tablesorter/jquery.tablesorter.js"></script>
 <script type="text/javascript">
 $(document).ready(function() {
 $("#sort-table").tablesorter(); 
 });
</script>
<script>  
 
    // $('#sub').click(function(){
    //     //console.log(2345678);
    //      var c_name = $('input[name=c_name]').val();
    //     $.ajax({
    //         url:"/admin/cname",
    //         type:'post',
    //         dataType:"json",
    //         data:{c_name:c_name},
    //         success:function(res){
              
    //        var str = '';
    //             $(res).each(function(i,v){
    //    str+='<td>'+v.c_id+'</td><td><img src="http://blogs.com/'+v.c_img+'" width="100"></td>\
    //   <td>'+v.c_name+'</td>'+v.c_id+'</td>\
    //     <td>'+v.c_desc+'</td>\
    //   <td><div class="button-group">\
    //   <a class="button border-main" href="{{route('edittestc',['c_id'=>'+v.c_id+'])}}">\
    //   <span class="icon-edit"></span> 修改</a>\
    //   <a class="button border-red" href="columndel?c_id='+v.c_id+'" onclick="return del(1,1)">\
    //   <span class="icon-trash-o"></span> 删除</a>\
    //   </div></td>';
    //             })
    //             $('#tr').remove('td');
    //             $('#tr').append(str);

                 
    //         },
    //      })
    // })


    //   //正序
    // $(document).on('click','.by',function(){
    //     var token =localStorage.getItem('token');
    //     // console.log(token);

    //     $.ajax({
    //         url:"/admin/by",
    //         type:"post",
    //         data:{token:token},
    //         dataType:"json",
    //         success:function(res){
    //             //console.log(res);
    //             if(res.code==101){
    //                 alert(res.message);
    //             }
    //             var str = '';
    //             $(res).each(function(i,v){
    //    str+='<td>'+v.c_id+'</td><td><img src="http://blogs.com/'+v.c_img+'" width="100"></td>\
    //   <td>'+v.c_name+'</td>'+v.c_id+'</td>\
    //     <td>'+v.c_desc+'</td>\
    //   <td><div class="button-group">\
    //   <a class="button border-main" href="{{route('edittestc',['c_id'=>'+v.c_id+'])}}">\
    //   <span class="icon-edit"></span> 修改</a>\
    //   <a class="button border-red" href="columndel?c_id='+v.c_id+'" onclick="return del(1,1)">\
    //   <span class="icon-trash-o"></span> 删除</a>\
    //   </div></td>';
    //             })
    //              $('#tr').remove();
    //             $('#tr').append(str);

    //         }
    //     })
    // })

    // //点击倒序
    // $(document).on('click','.desc',function(){
    //     var token =localStorage.getItem('token');
    //     // console.log(token);

    //     $.ajax({
    //         url:"/admin/desc",
    //         type:"post",
    //         data:{token:token},
    //         dataType:"json",
    //         success:function(res){
    //             //console.log(res);
    //             if(res.code==101){
    //                 alert(res.message);
    //             }

    //         }
    //     })
    // })

</script>