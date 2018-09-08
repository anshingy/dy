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
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="/dy/Public/admin/static/h-ui.admin/css/style.css" />
	<!--[if IE 6]>
	<script type="text/javascript" src="/dy/Public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>创意审核</title>
</head>
<body>
<div class="page-container">
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
		<tr>
			<th scope="col" colspan="13">创意审核</th>
		</tr>
		<tr class="text-c">
			<th width=""><input name="" type="checkbox" value=""></th>
			<th width="">ID</th>
			<th width="">推广单元名称</th>
			<th>推广类型</th>
			<th width="">创意名称</th>
			<th width="150">创意标题</th>
			<th width="150">创意描述</th>
			<th>创意视频</th>
			<th width="">审核状态</th>
			<th width="">广告按钮</th>
			<th width="50">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($tgideainfo)): foreach($tgideainfo as $key=>$v): ?><tr class="text-c">
				<td><input name="" type="checkbox" value="<?php echo ($v["c_id"]); ?>"></td>
				<td><?php echo ($v["c_id"]); ?></td>
				<td><?php echo ($v["c_utilname"]); ?></td>
				<td>链接推广</td>
				<td><?php echo ($v["c_name"]); ?></td>
				<td><?php echo ($v["c_title"]); ?></td>
				<td><?php echo ($v["c_desc"]); ?></td>
				<td><a href="<?php echo ($v["c_url"]); ?>" target="_blank">
					<video width="240" height="100" controls>
						<source src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" type="video/mp4">
						<source src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" type="video/ogg">
						<source src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" type="video/webm">
						<object data="/dy/Public/<?php echo ($v["c_videourl"]); ?>" width="240" height="100">
							<embed src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" width="240" height="100">
						</object>
					</video>
				</a></td>
				<td><span><?php echo ($v['c_status']==1 ? '通过':'待审核'); ?></span> </td>
				<td><?php echo ($v["c_button"]); ?></td>
				<td class="f-14">
					<?php if($v["c_status"] == 1): ?><a title="拒绝" href="javascript:;" onclick="Ideas_edit('填写拒绝理由', '<?php echo u('refuseidea/index');?>?did=<?php echo ($v["c_id"]); ?>', '550','400')" style="text-decoration:none">拒绝</a>
						<?php else: ?>	<a title="通过" href="javascript:;" onclick="changstatus(this,<?php echo ($v["c_id"]); ?>)" style="text-decoration:none">通过</a><?php endif; ?>
					                                                    </td>
			</tr><?php endforeach; endif; ?>

		</tbody>
	</table>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">

    function AdPlan_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }

    function AdPlan_edit(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }
    function Ideas_edit(title,url,w,h){
        layer_show(title,url,w,h);
    }
    //修改状态
    function changstatus(obj, id) {
        layer.confirm('是否给予通过？', function (index) {
            $.post("<?php echo U('refuseidea/pass');?>",
                {
                    did:id
                },function (e) {
                    e=JSON.parse(e);
                    console.log(e)
                    if (e.status==1){
                        layer.msg('已通过!', { icon: 1, time: 1000 });
                        window.location.reload();
                    }else if(e.status==-1){
                        layer.msg('参数有误!', { icon: 1, time: 1000 });
                    }else{
                        layer.msg(e.msg, { icon: 0, time: 1000 });
                        window.location.reload();
                    }
                })
        });
    }

</script>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/dy/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/dy/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/dy/Public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/dy/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/dy/Public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/dy/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/dy/Public/admin/lib/laypage/1.2/laypage.js"></script>
</body>
</html>