<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="/dy/Public/admin/lib/html5shiv.js"></script>
	<script type="text/javascript" src="/dy/Public/admin/lib/respond.min.js"></script>
	<!--layer-->
	<link href="/dy/Public/admin/static/h-ui/js/layer/css/layui.css" rel="stylesheet">
	<script src="/dy/Public/admin/static/h-ui/js/layer/layui.js" charset="utf-8"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/static/h-ui.admin/css/style.css" />
	<!--[if IE 6]>
	<script type="text/javascript" src="/dy/Public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<![endif]-->
<title>编辑创意</title>
</head>
<body>


<div class="page-container" style=" padding-left:50px;">
	<form action="" method="post" class="form form-horizontal" id="form-product-add" enctype="multipart/form-data" onkeydown="if(event.keyCode==13)return false;">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-1" style=" width:135px;"><span class="c-red">*</span>推广单元名称：</label>
			<div class="formControls col-xs-8 col-sm-5">
				<?php echo ($cyinfo["c_utilname"]); ?>
			</div>
			<input type="hidden" value="<?php echo ($cyinfo["c_id"]); ?>" name="c_id">
		</div>
		<div class="row cl">
		<div class="formControls col-xs-8 col-sm-8">
			<button type="button" class="layui-btn" id="test5"><i class="layui-icon"></i>选择视频</button>
			<div class="layui-upload-list" style="display: inherit">
				<input type="hidden" id="videos" required="required" name="c_videourl"  value="<?php echo ($cyinfo["c_videourl"]); ?>"/>
				<a href="javascript:deletevide();" title="点击删除"><img id="deletevideo" src="/dy/Public/admin/js/img/uploadify-cancel.png">
				</a>
				<video class="" onclick="playPause()" src="/dy/Public/<?php echo ($cyinfo["c_videourl"]); ?>"  id="demo"  width="250" heigt="200"/>
			</div>
		</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-1" style=" width: 135px;"><span class="c-red">*</span>创意名称：</label>
			<div class="formControls col-xs-8 col-sm-8">
				<input type="text" class="input-text" value="<?php echo ($cyinfo["c_name"]); ?>" placeholder="最长6个字" id="name" name="c_name" style="width: 350px; ">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-1" style=" width: 135px;"><span class="c-red">*</span>创意标题：</label>
			<div class="formControls col-xs-8 col-sm-8">
				<input type="text" class="input-text" value="<?php echo ($cyinfo["c_title"]); ?>" placeholder="最长20个字" id="title" name="c_title" style=" width: 350px;" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-1" style=" width: 135px;"><span class="c-red">*</span>创意链接：</label>
			<div class="formControls col-xs-8 col-sm-8">
				<input type="text" class="input-text" value="<?php echo ($cyinfo["c_url"]); ?>" placeholder="" id="url" name="c_url" style=" width: 350px;" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-1" style=" width: 135px;"><span class="c-red">*</span>广告按钮：</label>
			<div class="formControls col-xs-8 col-sm-8">
				<input type="text" class="input-text" value="<?php echo ($cyinfo["c_button"]); ?>" placeholder="" id="button" name="c_button" style=" width: 350px;" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-1" style=" width: 135px;"><span class="c-red">*</span>广告描述：</label>
			<div class="formControls col-xs-8 col-sm-8">
				<input type="text" class="input-text" value="<?php echo ($cyinfo["c_desc"]); ?>" placeholder="" id="note" name="c_desc" style=" width: 350px;" />
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-11 col-xs-offset-3 col-sm-offset-2">
				<a onclick="save_submit();" id="savebt" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</a>
				<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/dy/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/dy/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/dy/Public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/dy/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/dy/Public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/dy/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/dy/Public/admin/lib/laypage/1.2/laypage.js"></script>
<script>
    layui.use('upload', function(){
        var $ = layui.jquery
            ,upload = layui.upload;
        upload.render({
            elem: '#test5'
            ,url:"<?php echo U('image/uploadvideo');?>"
            ,accept: 'video' //视频
            ,done: function(res){
                console.log(res.data)
                $("#videos").attr('value',"uploadvideo/"+res.data);
                $("#demo").attr('src',"/dy/Public/uploadvideo/"+res.data);
                $('#demo').show();
                $('#deletevideo').show();
            }
        });
    });
</script>
<script>
    function deletevide() {
        var src=$('#demo').attr('src');
        //alert(src);
        $.ajax({
            type: "POST", //访问WebService使用Post方式请求
            url: "<?php echo U('Addidea/del');?>", //调用WebService的地址和方法名称组合---WsURL/方法名
            data: "src=" + src,
            success: function(data){
                console.log(data);
            }
        });
        $("#videos").attr('value','');
        $("#demo").attr('src','');
        $('#deletevideo').hide();
        $('#demo').hide();

    }
</script>
<script type="text/javascript">

    $(function () {

        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        //表单验证
        $("#form-product-add").validate({
            rules: {
                name: { required: true, },
                title: { required: true},
                url: { required: true},
                button: { required: true},
            },
            onkeyup: false,
            focusCleanup: true,
            success: "valid"
        });
    });
    function save_submit() {
        if($('#videos').val().length<=0){
            alert('视频不可为空');
            return false;
        }else if($('#name').val().length<=0){
            alert('创意名称不可为空');
            return false;
        }else if($('#title').val().length<=0){
            alert('创意标题不可为空');
            return false;
        }else if($('#url').val().length<=0){
            alert('创意链接不可为空');
            return false;
        }else if($('#button').val().length<=0){
            alert('按钮不可为空');
            return false;
        }else{
            var getdata=$('#form-product-add').serializeArray();
            var index = layer.load(0, {shade: false});
            var index = layer.load(1, {
                shade: [0.1,'#fff']
            });
            $('#savebt').attr('onclick','');
            $('#savebt').removeClass("btn-primary");
            $.post("<?php echo U('Editidea/index');?>",
                {
                    data:getdata
                },function (e) {
                    e=JSON.parse(e);
                    console.log(e)
                    if (e.status==1){
                        parent.location.reload();
                        $('#savebt').attr('onclick','save_submit();');
                        $('#savebt').addClass("btn-primary");
                        console.log(e.msg);
                    }else if(e.status==-1){
                        alert('发生未知错误');
                        layer_close();
                    }else{
                        alert('修改失败');
                        parent.location.reload();
                        console.log(e.msg);
                    }
                })

            //$('#form-member-add').submit();
        }

    }
</script>

</body>
</html>