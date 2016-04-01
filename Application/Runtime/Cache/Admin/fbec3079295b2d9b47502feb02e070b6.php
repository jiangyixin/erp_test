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
    <link rel="stylesheet" type="text/css" href="/php/erp/test/./Application/Admin/View/Public/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/./Application/Admin/View/Public/css/theme/default.css"><!--<?php echo C('ADMIN_THEME');?>-->
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/animate/animate.min.css">
    <link rel="stylesheet" href="/php/erp/test/Public/libs/jquery_smartmenu/css/smartMenu.css">
    
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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

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
                        <li>
                            <a data-toggle="collapse" href="#navside-collapse--1">
                                <i class="fa fa-folder-open-o"></i>
                                <span class="nav-label"><?php echo ($menuList["label"]["title"]); ?>管理</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav navside-nav navside-second collapse in" >
                                <?php if(is_array($menuList["list"])): foreach($menuList["list"] as $key=>$vo): ?><li class="<?php if((ACTION_NAME) == $vo["name"]): ?>active<?php endif; ?>">
                                        <a href="<?php echo U($vo['url']);?>">
                                            <i class="<?php echo ($vo["icon"]); ?>"></i>
                                            <span><?php echo ($vo["title"]); ?></span>
                                        </a>
                                    </li><?php endforeach; endif; ?>
                            </ul>
                        </li>
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
            <li class="text-muted">供应商管理</li><li class="text-muted">供应商列表</li>
        </ul>

        <!-- 主体内容区域 -->
        <div class="tab-content ct-tab-content">

            <div class="builder listbuilder-box panel-body">
                <!-- Tab导航 -->

                <!-- 顶部工具栏按钮 -->
                <div class="builder-toolbar">
                    <div class="row">
                        <!-- 工具栏按钮 -->
                        <div class="col-xs-12 col-sm-9 button-list clearfix">
                            <div class="form-group">
                                <a title="新增" class="btn btn-primary" href="<?php echo U('Supplier/supplierInfo');?>?way=edit">新增</a>&nbsp;
                                <a title="删除" target-form="ids" class="btn btn-danger ajax-post confirm" model="Link" href="<?php echo U('Supplier/supplierDel');?>">删除</a>&nbsp;
                            </div>
                        </div>
                        <!-- 搜索框 -->
                        <div class="col-xs-12 col-sm-3 clearfix">
                            <form class="form" method="get" action="">
                                <div class="form-group">
                                    <div class="input-group search-form">
                                        <input type="text" name="keyword" class="search-input form-control" value="" placeholder="请输入ID/链接名称">
                                        <span class="input-group-btn"><a class="btn btn-default search-btn"><i class="fa fa-search"></i></a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- 数据列表 -->
                <div class="builder-container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="builder-table">
                                <div class="panel panel-default table-responsive">
                                    <table  id="supplierList" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th><input class="check-all" type="checkbox"></th>
                                            <th>名称</th>
                                            <th>分组</th><th>负责人</th>
                                            <th>电话</th><th>地址</th>
                                            <th>联系人</th><th>备注</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($supplierList)): foreach($supplierList as $key=>$vo): ?><tr title="" data-id="<?php echo ($vo["id"]); ?>">
                                                <td><input class="ids" type="checkbox" value="<?php echo ($vo["id"]); ?>" name="ids[]"></td>
                                                <td><a title="查看供应商详情" href="<?php echo U('Supplier/supplierInfo');?>?id=<?php echo ($vo["id"]); ?>&way=show"><?php echo ($vo["name"]); ?></a></td>
                                                <td><?php echo ($vo["supplier_group"]["name"]); ?></td>
                                                <td><?php if(is_array($vo["partner"])): foreach($vo["partner"] as $key=>$v): echo ($v["name"]); ?>&nbsp;&nbsp;<?php endforeach; endif; ?>
                                                </td>
                                                <td><?php echo ($vo["tel"]); ?></td>
                                                <td><?php echo ($vo["address"]); ?></td>
                                                <td><?php if(is_array($vo["linkman"])): foreach($vo["linkman"] as $key=>$v): ?><a title="查看联系人信息" href="<?php echo U('Supplier/linkmanList');?>?keyword=<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a>&nbsp;&nbsp;<?php endforeach; endif; ?>
                                                </td>
                                                <th><?php echo ($vo["note"]); ?></th>
                                            </tr><?php endforeach; endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- 额外功能代码 -->
            </div>

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
        <script type="text/javascript" src="/php/erp/test/./Application/Admin/View/Public/js/admin.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/jquery_smartmenu/js/jquery-smartMenu-min.js"></script>
        <script type="text/javascript">

        </script>
        
<script type="text/javascript">

    var tableMenuData = [
        [{
            text: "查看详情",
            func: function() {
                var id = $(this).attr('data-id');
                window.location = "<?php echo U('Supplier/supplierInfo');?>?id=" + id + '&way=show';
            }
        }, {
            text: "修改",
            func: function() {
                var id = $(this).attr('data-id');
                window.location = "<?php echo U('Supplier/supplierInfo');?>?id=" + id + '&way=edit';
            }
        }, {
            text: "删除",
            func: function() {
                var result = confirm('确定要执行该操作？');
                if (!result) return;
                var id = $(this).attr('data-id');
                $.post("<?php echo U('Supplier/supplierDel');?>", { id: id}, function(data) {
                    if (data.status) {
                        $.alertMessager(data.info, 'success');
                        window.setTimeout(function() {
                            window.location = data.url;
                        }, 2000);
                    } else {
                        $.alertMessager(data.info, 'error');
                    }
                } );
            }
        }]
    ];

    $(window).ready(function(e) {
        /*$('#supplierList').on('dblclick', 'tr', function() {
            var id = $(this).attr('data-id');
            alert(id);
        })*/

        $("#supplierList tbody tr").smartMenu(tableMenuData, {
            name: "table"
        });

    });
</script>

    </div>
</div>

</body></html>