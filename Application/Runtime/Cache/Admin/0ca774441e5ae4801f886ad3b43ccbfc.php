<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title><?php echo ($meta_title); ?>｜<?php echo C('WEB_SITE_TITLE');?>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="author" content="<?php echo C('WEB_SITE_TITLE');?>">
    <meta name="keywords" content="<?php echo ($meta_keywords); ?>">
    <meta name="description" content="<?php echo ($meta_description); ?>">
    <meta name="generator" content="CoreThink">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php echo C('WEB_SITE_TITLE');?>">
    <meta name="format-detection" content="telephone=no,email=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="apple-touch-icon" type="image/x-icon" href="/php/erp/test/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/php/erp/test/logo.png">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/cui/css/cui.min.css">
    <link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/admin.css">
    <link rel="stylesheet" type="text/css" href="__ADMIN_CSS__/theme/<?php echo C('ADMIN_THEME');?>.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/animate/animate.min.css">
    
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/php/erp/test/Public/libs/jquery/1.x/jquery.min.js"></script>
</head>
<body>
    <div class="clearfix full-header">
        
            <?php if (!C('ADMIN_TABS')): ?>
                <!-- 顶部导航 -->
                <div class="navbar navbar-inverse navbar-fixed-top main-nav" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
                        <span class="sr-only">切换导航</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php if(C('WEB_SITE_LOGO')): ?>
                        <a class="navbar-brand" target="_blank" href="/php/erp/test/">
                            <img class="logo img-responsive" src="<?php echo (get_cover(C("WEB_SITE_LOGO"))); ?>">
                        </a>
                    <?php else: ?>
                        <a class="navbar-brand" target="_blank" href="/php/erp/test/">
                            <span><?php echo C('PRODUCT_LOGO');?></span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="collapse navbar-collapse navbar-collapse-top">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo U('Admin/Index/index');?>">
                                <i class="fa fa-home"></i>
                                <span>首页</span>
                            </a>
                        </li>
                        <!-- 主导航 -->
                        <?php if (count($_main_menu_list) > 7): ?>
                            <?php if(is_array($_main_menu_list)): $i = 0; $__LIST__ = array_slice($_main_menu_list,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($_parent_menu_list[0]['title'] == $vo['title']) echo 'class="active"'; ?>>
                                    <a href="<?php echo U($vo['name'].'/Index/index');?>" target="<?php echo C(strtolower($vo['name']).'_config.target'); ?>">
                                        <i class="fa <?php echo ($vo["icon"]); ?>"></i>
                                        <span><?php echo ($vo["title"]); ?></span>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-th-large"></i> 更多 <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if(is_array($_main_menu_list)): $i = 0; $__LIST__ = array_slice($_main_menu_list,7,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($_parent_menu_list[0]['title'] == $vo['title']) echo 'class="active"'; ?>>
                                            <a href="<?php echo U($vo['name'].'/Index/index');?>" target="<?php echo C(strtolower($vo['name']).'_config.target'); ?>">
                                                <i class="fa <?php echo ($vo["icon"]); ?>"></i>
                                                <span><?php echo ($vo["title"]); ?></span>
                                            </a>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <?php if(is_array($_main_menu_list)): $i = 0; $__LIST__ = $_main_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if($_parent_menu_list[0]['title'] == $vo['title']) echo 'class="active"'; ?>>
                                    <a href="<?php echo U($vo['name'].'/Index/index');?>" target="<?php echo C(strtolower($vo['name']).'_config.target'); ?>">
                                        <i class="fa <?php echo ($vo["icon"]); ?>"></i>
                                        <span><?php echo ($vo["title"]); ?></span>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php endif; ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo U('Admin/Index/removeRuntime');?>" class="ajax-get no-refresh"><i class="fa fa-trash"></i> 清空缓存</a></li>
                        <li><a target="_blank" href="/php/erp/test/"><i class="fa fa-external-link-square"></i> 打开前台</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i> <?php echo ($_user_auth["username"]); ?> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo U('Admin/Public/logout');?>" class="ajax-get"><i class="fa fa-sign-out"></i> 退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        
    </div>

    <div class="clearfix full-container">
        
            <?php if (!C('ADMIN_TABS')): ?>
                <div class="container-fluid with-top-navbar">
                    <div class="row">
                        <!-- 后台左侧导航 -->
                        <div id="sidebar" class="col-xs-12 col-sm-2 sidebar tab-content">
                            <!-- 模块菜单 -->
                            <nav class="navside navside-default" role="navigation">
                                <?php if($_menu_list['_child']): ?>
                                    <ul class="nav navside-nav navside-first">
                                        <?php if(is_array($_menu_list["_child"])): $fkey = 0; $__LIST__ = $_menu_list["_child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_ns_first): $mod = ($fkey % 2 );++$fkey;?><li>
                                                <a data-toggle="collapse" href="#navside-collapse-<?php echo ($_ns["id"]); ?>-<?php echo ($fkey); ?>">
                                                    <i class="<?php echo ($_ns_first["icon"]); ?>"></i>
                                                    <span class="nav-label"><?php echo ($_ns_first["title"]); ?></span>
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <?php if(!empty($_ns_first["_child"])): ?><ul class="nav navside-nav navside-second collapse in" id="navside-collapse-<?php echo ($_ns["id"]); ?>-<?php echo ($fkey); ?>">
                                                        <?php if(is_array($_ns_first["_child"])): $skey = 0; $__LIST__ = $_ns_first["_child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$_ns_second): $mod = ($skey % 2 );++$skey;?><li <?php if($_parent_menu_list[2]['id'] == $_ns_second['id']) echo 'class="active"'; ?>>
                                                                <a href="<?php echo U($_ns_second['url']);?>" >
                                                                    <i class="<?php echo ($_ns_second["icon"]); ?>"></i>
                                                                    <span class="nav-label"><?php echo ($_ns_second["title"]); ?></span>
                                                                </a>
                                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </ul><?php endif; ?>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </nav>
                        </div>

                        <!-- 右侧内容 -->
                        <div id="main" class="col-xs-12 col-sm-10 main"  style="overflow-y: scroll;">
                            <!-- 面包屑导航 -->
                            <ul class="breadcrumb">
                                <li><i class="fa fa-map-marker"></i></li>
                                <?php if(is_array($_parent_menu_list)): $i = 0; $__LIST__ = $_parent_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="text-muted"><?php echo ($vo["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>

                            <!-- 主体内容区域 -->
                            <div class="tab-content ct-tab-content">
                                <block name="main">
                            </div>

                            <div class="clearfix footer">
                                <div class="navbar navbar-default" role="navigation">
                                    <div class="container-fluid">
                                        <div class="navbar-header">
                                            <a class="navbar-brand" target="_blank" href="/php/erp/test/">
                                                <span><?php echo C('PRODUCT_NAME');?></span>
                                            </a>
                                        </div>
                                        <div class="collapse navbar-collapse navbar-collapse-bottom">
                                            <ul class="nav navbar-nav">
                                                <li>
                                                    <a href="<?php echo C('WEBSITE_DOMAIN');?>" class="text-muted" target="_blank">
                                                        <span>版权所有 © 2014-<?php echo date("Y",time()); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="nav navbar-nav navbar-right">
                                                <li><a class="text-muted pull-right">框架开发：<?php echo C('COMPANY_NAME');?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                
            <?php endif; ?>
        </block>
    </div>

    <div class="clearfix full-footer">
        
    </div>

    <div class="clearfix full-script">
        <div class="container-fluid">
            <input type="hidden" id="corethink_home_img" value="__HOME_IMG__">
            <script type="text/javascript" src="__CUI__/js/cui.min.js"></script>
            <script type="text/javascript" src="__ADMIN_JS__/admin.js"></script>
            <script type="text/javascript">
                var admin_tabs = '<?php echo ($_admin_tabs); ?>';
                if(admin_tabs == '1' && !(self.frameElement != null && (self.frameElement.tagName == "IFRAME" || self.frameElement.tagName == "iframe"))){
                    parent.parent.location = "<?php echo U('Admin/Index/index');?>";
                }
            </script>
            
        </div>
    </div>
</body>
</html>