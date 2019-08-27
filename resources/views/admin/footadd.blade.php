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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"><a href="/admin/footlist">底部友情链接列表</a></span></strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/footadddo">
      <div class="form-group">
        <div class="label">
          <label>链接名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="f_name" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>URL：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="f_url" data-validate="required:请输入url链接地址!" />
          <div class="tips"></div>
        </div>
      </div>



      <div class="form-group">
        <div class="label">
          <label>展示级别：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="details" data-validate="required:" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 添加</button>

        </div>
      </div>
    </form>
  </div>
</div>

</body>

</html>