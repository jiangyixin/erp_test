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
        td.operate {
            text-align: center;
        }
        td .add-row {
            color: #333;
            margin-right: 10px;
        }
        td .del-row {
            text-align: right;
            color: #333;
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
            <li class="text-muted">供应商管理</li><li class="text-muted">供应商详情</li><li class="text-muted">编辑供应商</li>
        </ul>

        <!-- 主体内容区域 -->
        <div class="tab-content ct-tab-content">

            <div class="builder listbuilder-box panel-body">
                <!-- Tab导航 -->

                <!-- 数据列表 -->
                <div class="builder-container">
                    <div class="row">
                        <div class="col-xs-12">
                            <form id="supplier" action="" method="post" class="form-horizontal" data-id="<?php echo ($supplier["id"]); ?>">
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">名字</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input type="text" class="form-control" name="supplier.name" value="<?php echo ($supplier["name"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">分组</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <select name="supplier.supplier_group_id" class="form-control">
                                            <option value="">请选择：</option>
                                            <?php if(is_array($supplierGroup)): foreach($supplierGroup as $key=>$vo): switch($vo["id"]): case $supplier["group"]["id"]: ?><option value="<?php echo ($vo["id"]); ?>" selected="selected"><?php echo ($vo["name"]); ?></option><?php break;?>
                                                    <?php default: ?>
                                                        <option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endswitch; endforeach; endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">电话</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input type="text" class="form-control" name="supplier.tel" value="<?php echo ($supplier["tel"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">地址</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input type="text" class="form-control" name="supplier.address" value="<?php echo ($supplier["address"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">备注</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <textarea name="supplier.note" class="form-control" rows="3"><?php echo ($supplier["note"]); ?></textarea>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-lg-10">
                            <div class="builder-table">
                                <div class="panel panel-default table-responsive">
                                    <table id="linkman" class="table table-bordered table-striped table-hover table-input">
                                        <caption>供应商联系人列表</caption>
                                        <thead>
                                            <tr>
                                                <th>联系人</th>
                                                <th>手机</th>
                                                <th>邮箱</th><th>QQ</th>
                                                <th>备注</th><th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($supplier["linkman"])): foreach($supplier["linkman"] as $key=>$vo): ?><tr data-id="<?php echo ($vo["id"]); ?>">
                                                <td><input type="text" name="name" value="<?php echo ($vo["name"]); ?>"></td>
                                                <td><input type="text" name="mobile" value="<?php echo ($vo["mobile"]); ?>"></td>
                                                <td><input type="email" name="email" value="<?php echo ($vo["email"]); ?>"></td>
                                                <td><input type="text" name="qq" value="<?php echo ($vo["qq"]); ?>"></td>
                                                <td><input type="text" name="note" value="<?php echo ($vo["note"]); ?>"></td>
                                                <td class="operate"><a class="add-row" title="添加一行" href="javascript:;"><i class="fa fa-plus"></i></a><a title="删除当前行" class="del-row" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>
                                            </tr><?php endforeach; endif; ?>
                                        <?php if(empty($supplier["linkman"])): ?><tr>
                                                <td><input type="text" name="name"></td>
                                                <td><input type="text" name="mobile"></td>
                                                <td><input type="email" name="email"></td>
                                                <td><input type="text" name="qq"></td>
                                                <td><input type="text" name="note"></td>
                                                <td class="operate"><a class="add-row" title="添加一行" href="javascript:;"><i class="fa fa-plus"></i></a><a title="删除该联系人" class="del-row" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>
                                            </tr><?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 顶部工具栏按钮 -->
                <div class="builder-toolbar">
                    <div class="row">
                        <!-- 工具栏按钮 -->
                        <div class="col-xs-12 col-sm-9 button-list clearfix">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <button type="button" id="save" class="btn btn-primary">保存</button>
                                    <button type="button" class="btn btn-danger" onclick="history.back();">返回</button>
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
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/bootstrap_datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/broadin/js/admin.js"></script>
        <script type="text/javascript">
            var menuList = <?php echo json_encode($menuList);?>;
            console.log(menuList);
        </script>
        
    <script type="text/javascript">
        $(window).ready(function (e) {
            /*function checkTable() {
                var checkStr = '';
                $('#linkman').find('td[name]').each(function() {
                    var key = $(this).attr('name');
                    var value = $(this).html();
                    if (key == 'name' && !value) {
                        checkStr = '联系人姓名不能为空！';
                        return false;
                    }
                    if (key == 'mobile' && !value) {
                        checkStr = '联系人手机号码不能为空！';
                        return false;
                    }
                });
                return checkStr;
            }*/

            $('#save').on('click', function() {
                var supplier = {id: '', name: '', supplier_group_id: '', tel: '', address: '', note: '' };
                var supplierCheck = {name: '名字不能为空', 'supplier_group_id': '请选择分组', tel: '电话不能为空'};
                var linkMan = {id: '', name: '', mobile: '', email: '', qq: '', note: ''};
                var linkManCheck = {name: '', mobile: ''};
                supplier = broadin.getFormData('#supplier', supplier, 'supplier', supplierCheck);
                if (!supplier) {
                    return;
                }
                var linkManList = broadin.getTableData('#linkman', linkMan, null, linkManCheck);
                if (!linkManList) {
                    return;
                }
                console.log(supplier);
                console.log(linkManList);
                broadin.ajaxPost("<?php echo U('Supplier/supplierEdit');?>", {supplier: supplier, linkManList: linkManList});
            });

            var trTemplate = '<tr>' +
                    '<td><input type="text" name="name"></td>' +
                    '<td><input type="text" name="mobile"></td>' +
                    '<td><input type="email" name="email"></td>' +
                    '<td><input type="text" name="qq"></td>' +
                    '<td><input type="text" name="note"></td>' +
                    '<td class="operate"><a class="add-row" title="添加一行" href="javascript:;"><i class="fa fa-plus"></i></a><a title="删除该联系人" class="del-row" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>' +
                    '</tr>';

            $('#linkman').on('click', '.add-row', function() {
                broadin.addTableRow(this, trTemplate, 1);
            });

            $('#linkman').on('click', '.del-row', function() {
                broadin.delTableRow(this, "<?php echo U('Supplier/linkmanDel');?>");
            })
        });
    </script>

    </div>
</div>

</body></html>