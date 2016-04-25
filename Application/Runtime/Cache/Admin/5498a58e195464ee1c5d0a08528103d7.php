<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN"><head>
    <meta charset="utf-8">
    <title>｜后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="generator" content="CoreThink">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel="apple-touch-icon" type="image/x-icon" href="/php/erp/test/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/php/erp/test/logo.png">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/cui/css/cui.min.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/broadin/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/broadin/css/theme/default.css"><!--<?php echo C('ADMIN_THEME');?>-->
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/animate/animate.min.css">
    <link rel="stylesheet" href="/php/erp/test/Public/libs/jquery_smartmenu/css/smartMenu.css">
    <link rel="stylesheet" href="/php/erp/test/Public/libs/bootstrap_datetimepicker/css/bootstrap-datetimepicker.min.css">
    
    <style type="text/css">
        .form-control[disabled], fieldset[disabled] .form-control {
            cursor: auto;
        }

    </style>

    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/php/erp/test/Public/libs/jquery/1.x/jquery.min.js"></script>
</head>
<body>
<div class="clearfix full-header">
    
    <!-- 顶部导航 -->
    <div class="navbar navbar-inverse navbar-fixed-top main-nav" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" target="_blank" href="/php/erp/test/">
                <span><b><span class="open" style="color: #a5aeb4;">乐me</span><span class="cmf" style="color: #3fa9f5;">商城</span></b></span>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-collapse-top">
            <ul class="nav navbar-nav">
                <?php if(is_array($navList)): foreach($navList as $key=>$vo): ?><li class="<?php if((CONTROLLER_NAME) == $vo["name"]): ?>active<?php endif; ?>">
                        <a href="<?php echo U($vo['url']);?>">
                            <i class="<?php echo ($vo["icon"]); ?>"></i>
                            <span><?php echo ($vo["title"]); ?></span>
                        </a>
                    </li><?php endforeach; endif; ?>
                <!-- 主导航 -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Admin/Index/removeRuntime');?>" class="ajax-get no-refresh"><i class="fa fa-trash"></i> 清空缓存</a></li>
                <li><a target="_blank" href="/php/erp/test"><i class="fa fa-external-link-square"></i> 打开前台</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>  <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo U('Admin/Public/logout');?>" class="ajax-get"><i class="fa fa-sign-out"></i> 退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    
</div>

<div class="clearfix full-container">
    
    <div class="container-fluid with-top-navbar">
        <div class="row">
            <!-- 后台左侧导航 -->
            <div id="sidebar" class="col-xs-12 col-sm-2 sidebar tab-content">
                <!-- 模块菜单 -->
                <nav class="navside navside-default" role="navigation">
                    <ul class="nav navside-nav navside-first">
                        <?php if(is_array($menuList)): foreach($menuList as $key=>$vo): ?><li>
                                <a data-toggle="collapse" href="#navside-collapse--1">
                                    <i class="<?php echo ($vo["icon"]); ?>"></i>
                                    <span class="nav-label"><?php echo ($vo["label"]["title"]); ?></span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav navside-nav navside-second collapse in" >
                                    <?php if(is_array($vo["list"])): foreach($vo["list"] as $key=>$v): ?><li class="<?php if((ACTION_NAME) == $v["name"]): ?>active<?php endif; ?>">
                                            <a href="<?php echo U($v['url']);?>">
                                                <i class="<?php echo ($v["icon"]); ?>"></i>
                                                <span><?php echo ($v["title"]); ?></span>
                                            </a>
                                        </li><?php endforeach; endif; ?>
                                </ul>
                            </li><?php endforeach; endif; ?>


                    </ul>
                </nav>
            </div>

            <!-- 右侧内容 -->
            <div id="main" class="col-xs-12 col-sm-10 main" style="overflow-y: scroll;">
                <!-- 面包屑导航 -->
                <ul class="breadcrumb">
                    <li><i class="fa fa-map-marker"></i></li>
                </ul>

                <!-- 主体内容区域 -->
                <div class="tab-content ct-tab-content">
                    
    <div id="main" class="col-xs-12 col-sm-10 main" style="overflow-y: scroll;">
        <!-- 面包屑导航 -->
        <ul class="breadcrumb">
            <li><i class="fa fa-map-marker"></i></li>
            <li class="text-muted">仓储管理</li><li class="text-muted">编辑仓库</li>
        </ul>

        <!-- 主体内容区域 -->
        <div class="tab-content ct-tab-content">

            <div class="builder listbuilder-box panel-body">
                <!-- Tab导航 -->

                <!-- 数据列表 -->
                <form id="warehouse" action="" method="post" class="form form-horizontal">
                    <div class="builder-container">
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="hidden" name="id" value="<?php echo ($warehouse["id"]); ?>">
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">名字</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input type="text" class="form-control" name="name" value="<?php echo ($warehouse["name"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">负责人</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <select name="partner_id" class="form-control">
                                            <option value="">请选择：</option>
                                            <?php if(is_array($partnerList)): foreach($partnerList as $key=>$vo): switch($vo["id"]): case $warehouse["partner_id"]: ?><option value="<?php echo ($vo["id"]); ?>" selected="selected"><?php echo ($vo["name"]); ?></option><?php break;?>
                                                    <?php default: ?>
                                                    <option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endswitch; endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">电话</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input type="text" class="form-control" name="tel" value="<?php echo ($warehouse["tel"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">地址</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input type="text" class="form-control" name="address" value="<?php echo ($warehouse["address"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">备注</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <textarea name="note" class="form-control" rows="3"><?php echo ($warehouse["note"]); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="builder-toolbar">
                        <div class="row">
                            <!-- 工具栏按钮 -->
                            <div class="col-xs-12 col-sm-9 button-list clearfix">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-lg-offset-1 col-sm-10">
                                        <button type="button" id="save" target-form="form" class="btn btn-primary ajax-post">保存</button>
                                        <button type="button" class="btn btn-danger" onclick="history.back();">返回</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
                <!-- 额外功能代码 -->
        </div>
    </div>

                </div>

                <div class="clearfix footer">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" target="_blank" href="/php/erp/test">
                                    <span></span>
                                </a>
                            </div>
                            <div class="collapse navbar-collapse navbar-collapse-bottom">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="" class="text-muted" target="_blank">
                                            <span>版权所有 © 2014-2016</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a class="text-muted pull-right">北京博广通联技术有限公司</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="clearfix full-footer">
    
</div>

<div class="clearfix full-script">
    <div class="container-fluid">
        <!--<input type="hidden" id="corethink_home_img" value="/php/erp/test/./Application/Home/View/Public/img">-->
        <script type="text/javascript" src="/php/erp/test/Public/libs/cui/js/cui.min.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/broadin/js/admin.js"></script>
        <script type="text/javascript">
            var menuList = <?php echo json_encode($menuList);?>;
            console.log(menuList);
        </script>
        
    <script type="text/javascript">
        var warehouse = <?php echo json_encode($warehouse);?>;
        console.log(warehouse);

        function getFormData() {
            var warehouse = new Object();
            warehouse.id = $('[name="id"]').val();
            warehouse.name = $('[name="name"]').val();
            warehouse.partner_id = $('[name="partner_id"]').val();
            warehouse.tel = $('[name="tel"]').val();
            warehouse.address = $('[name="address"]').val();
            warehouse.note = $('[name="note"]').val();
            return warehouse;
        }

        function checkForm() {
            var checkStr = '';
            $('#warehouse').find('input[name]').each(function () {
                var key = $(this).attr('name');
                var value = $(this).val();
                if (key == 'name' && !value) {
                    checkStr = '仓库名字不能为空！';
                    return false;
                }
                if (key == 'tel' && !value) {
                    checkStr = '仓库电话不能为空！';
                    return false;
                }
                if (key == 'address' && !value) {
                    checkStr = '仓库地址不能为空！';
                    return false;
                }
            });
            return checkStr;
        }

        $(window).ready(function (e) {

            $('#save').on('click', function() {
                var checkStr = checkForm();
                if (checkStr) {
                    $.alertMessager(checkStr, 'danger');
                    return;
                }
                var warehouse = getFormData();
                console.log(warehouse);
                $.post("<?php echo U('Stock/warehouseEdit');?>", {warehouse: warehouse}, function(data) {
                    console.log(data);
                    if (!data.status) {
                        $.alertMessager('更新失败', 'danger');
                    } else {
                        $.alertMessager('更新成功，页面即将跳转', 'success');
                        window.setTimeout(function() {
                            window.location = "<?php echo U('Stock/index');?>";
                        }, 2000);
                    }
                });
            })


        });
    </script>

    </div>
</div>

</body></html>