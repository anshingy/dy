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
<title>广告创意</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 单元管理 <span class="c-gray en">&gt;</span> 推广创意 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
			 <a class="btn btn-primary radius" href="javascript:;" onclick="idea_add('<?php echo ($p_name); ?>-添加创意', '<?php echo U('Addidea/index');?>?did=<?php echo ($sid); ?>&id=<?php echo ($id); ?>', '1000', '520')"><i class="Hui-iconfont">&#xe600;</i> 添加创意</a>
            <a class="btn btn-primary radius" href="<?php echo U('Adutilplan/index');?>?id=<?php echo ($sid); ?>">返回单元</a>
        </span>
	</div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
		<tr>
			<th scope="col" colspan="13">创意管理</th>
		</tr>
		<tr class="text-c">
			<th width=""><input name="" type="checkbox" value=""></th>
			<th width="">ID</th>
			<th width="">推广单元名称</th>
			<th>推广类型</th>
			<th width="">创意名称</th>
			<th width="">创意标题</th>
			<th width="">创意描述</th>
			<th width="300">创意视频</th>
			<th width="">审核状态</th>
			<th width="">广告按钮</th>
			<th width="">操作</th>

		</tr>
		</thead>
		<tbody>
		<?php if(is_array($danyuan)): foreach($danyuan as $key=>$v): ?><tr class="text-c">
				<td><input name="" type="checkbox" value="<?php echo ($v["c_id"]); ?>"></td>
				<td><?php echo ($v["c_id"]); ?></td>
				<td><?php echo ($v["c_utilname"]); ?></td>
				<td>链接推广</td>
				<td><?php echo ($v["c_name"]); ?></td>
				<td><?php echo ($v["c_title"]); ?></td>
				<td><?php echo ($v["c_desc"]); ?></td>
				<?php if($v['isvideo'] == 1): ?><td><a href="<?php echo ($v["c_url"]); ?>" target="_blank">
						<video width="240" height="100" controls>
							<source src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" type="video/mp4">
							<source src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" type="video/ogg">
							<source src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" type="video/webm">
							<object data="/dy/Public/<?php echo ($v["c_videourl"]); ?>" width="240" height="100">
								<embed src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" width="240" height="100">
							</object>
						</video>
					</a>
					</td>
					<?php else: ?>
					<td><a href="<?php echo ($v["c_url"]); ?>" target="_blank">
						<img src="/dy/Public/<?php echo ($v["c_videourl"]); ?>" width="100" height="80">
					</a>
					</td><?php endif; ?>
				<td><span><?php echo ($v['c_status']==1 ? '通过':'待审核'); ?></span> </td>
				<td><?php echo ($v["c_button"]); ?></td>
				<td class="f-14">
					<a title="编辑" href="javascript:;" onclick="Ideas_edit('修改创意', '<?php echo U('Editidea/index');?>?id=<?php echo ($v["c_id"]); ?>', '2569', '900','520')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>&nbsp;&nbsp;
					<a title="删除" href="javascript:;" onclick="Ideas_del(this, <?php echo ($v["c_id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>

			</tr><?php endforeach; endif; ?>

		</tbody>
	</table>
</div>
</div>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">

    function idea_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }

    function Ideas_edit(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }
    function Ideas_del(obj, id) {
        layer.confirm('删除须谨慎，确认要删除吗？', function (index) {
            var index = layer.load(0, {shade: false});
            var index = layer.load(1, {
                shade: [0.1,'#fff']
            });
            $.post("<?php echo U('Adidea/deleleidea');?>",{id:id},function (e) {
                data=JSON.parse(e);
                if(data.status==1){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!', { icon: 1, time: 1000 });
                    layer.close(index);
                }else{
                    layer.msg(data.msg, { icon: 5, time: 1000 });
                    layer.close(index);
                }
            });

        });
    }

    function AdPlan_show(title, url, w, h) {
        layer_show(title, url, w, h);
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