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
                <li class="text-muted">仓储管理</li><li class="text-muted">调拨记录</li>
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
                                <a title="新增" class="btn btn-primary" href="<?php echo U('Stock/transfer');?>">新增</a>&nbsp;
                            </div>
                        </div>
                        <!-- 搜索框 -->
                        <div class="col-xs-12 col-sm-3 clearfix">
                            <form class="form" method="get" action="">
                                <div class="form-group">
                                    <div class="input-group search-form">
                                        <input type="text" name="keyword" class="search-input form-control" value="" placeholder="请输入编号">
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
                                    <table id="stockLogList" class="table table-bordered table-striped table-hover">
                                        <caption>调拨列表</caption>
                                        <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>主题</th>
                                            <th>负责人</th>
                                            <th>时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!--offset="0" length='10'-->
                                        <?php if(is_array($stockLogList)): $i = 0; $__LIST__ = $stockLogList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr title="" data-id="<?php echo ($vo["id"]); ?>">
                                                <td><?php echo ($vo["no"]); ?></td>
                                                <td><?php echo ($vo["title"]); ?></td>
                                                <td><?php echo ($vo["partner"]["name"]); ?></td>
                                                <td><?php echo ($vo["create_time"]); ?></td>
                                                <td><a title="详情" class="label label-primary" href="<?php echo U('transferDetail');?>?id=<?php echo ($vo["id"]); ?>">详情</a></td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(empty($stockLogList)): ?><tr>
                                                <td class="text-center empty-info" colspan="9">
                                                    <i class="fa fa-database"></i> 暂时没有数据<br>
                                                </td>
                                            </tr><?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div style="text-align: right;">
                                <?php echo ($page); ?>
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
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/broadin/js/admin.js"></script>
        <script type="text/javascript">
            var menuList = <?php echo json_encode($menuList);?>;
            console.log(menuList);
        </script>
        
<script type="text/javascript">
    $(window).ready(function(e) {

    });
</script>

    </div>
</div>

</body></html>