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
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="apple-touch-icon" type="image/x-icon" href="/php/erp/test/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/php/erp/test/logo.png">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/cui/css/cui.min.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/./Application/Admin/View/Public/css/admin.css">
    <link rel="stylesheet" type="text/css" href="/php/erp/test/./Application/Admin/View/Public/css/theme/default.css"><!--<?php echo C('ADMIN_THEME');?>-->
    <link rel="stylesheet" type="text/css" href="/php/erp/test/Public/libs/animate/animate.min.css">
    <link rel="stylesheet" href="/php/erp/test/Public/libs/jquery_smartmenu/css/smartMenu.css">
    
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
                                        <input type="text" class="form-control" name="name" value="<?php echo ($supplier["name"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">分组</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <select name="group" class="form-control">
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
                                        <input type="text" class="form-control" name="tel" value="<?php echo ($supplier["tel"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">地址</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input type="text" class="form-control" name="address" value="<?php echo ($supplier["address"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">创建时间</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input disabled type="text" class="form-control" value="<?php echo ($supplier["create_time"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">更新时间</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input disabled type="text" class="form-control" value="<?php echo ($supplier["update_time"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 col-lg-1 control-label">备注</label>
                                    <div class="col-sm-8 col-lg-7">
                                        <input type="text" class="form-control" name="note" value="<?php echo ($supplier["note"]); ?>">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-10 col-lg-8">
                            <h4>供应商联系人列表：</h4>
                            <div class="builder-table">
                                <div class="panel panel-default table-responsive">
                                    <table id="linkman" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>联系人</th>
                                                <th>手机</th><th>电话</th>
                                                <th>邮箱</th><th>QQ</th>
                                                <th>备注</th><th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($supplier["linkman"])): foreach($supplier["linkman"] as $key=>$vo): ?><tr data-id="<?php echo ($vo["id"]); ?>">
                                                <td contenteditable="true" name="name"><?php echo ($vo["name"]); ?></td>
                                                <td contenteditable="true" name="mobile"><?php echo ($vo["mobile"]); ?></td>
                                                <td contenteditable="true" name="tel"><?php echo ($vo["tel"]); ?></td>
                                                <td contenteditable="true" name="email"><?php echo ($vo["email"]); ?></td>
                                                <td contenteditable="true" name="qq"><?php echo ($vo["qq"]); ?></td>
                                                <td contenteditable="true" name="note"><?php echo ($vo["note"]); ?></td>
                                                <td class="operate"><a class="add-row" title="添加一行" href="javascript:;"><i class="fa fa-plus"></i></a><a title="删除当前行" class="del-row" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>
                                            </tr><?php endforeach; endif; ?>
                                        <?php if(empty($supplier["linkman"])): ?><tr>
                                                <td contenteditable="true" name="name"></td>
                                                <td contenteditable="true" name="mobile"></td>
                                                <td contenteditable="true" name="tel"></td>
                                                <td contenteditable="true" name="email"></td>
                                                <td contenteditable="true" name="qq"></td>
                                                <td contenteditable="true" name="note"></td>
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
                                <div class="col-sm-offset-2 col-lg-offset-1 col-sm-10">
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
        <script type="text/javascript" src="/php/erp/test/./Application/Admin/View/Public/js/admin.js"></script>
        <script type="text/javascript" src="/php/erp/test/Public/libs/jquery_smartmenu/js/jquery-smartMenu-min.js"></script>
        <script type="text/javascript">

        </script>
        
    <script type="text/javascript">
        $(window).ready(function (e) {

            function getFormData() {
                var supplier = new Object();
                supplier.id = $('form').attr('data-id');
                supplier.name= $('[name="name"]').val();
                supplier.supplier_group_id= $('[name="group"]').val();
                supplier.tel = $('[name="tel"]').val();
                supplier.address = $('[name="address"]').val();
                supplier.note = $('[name="note"]').val();
                return supplier;
            }

            function getTableData() {
                var table = $('#linkman').get(0);
                var linkmanList = new Array();
                var linkman = null;
                for(var i=1; i<table.rows.length; i++) {
                    linkman = new Object();
                    linkman['id'] = $(table.rows[i]).attr('data-id');
                    linkman['name'] = table.rows[i].cells[0].innerText;
                    linkman['supplier_id'] = $('form').attr('data-id');
                    linkman['mobile'] = table.rows[i].cells[1].innerText;
                    linkman['tel'] = table.rows[i].cells[2].innerText;
                    linkman['email'] = table.rows[i].cells[3].innerText;
                    linkman['qq'] = table.rows[i].cells[4].innerText;
                    linkman['note'] = table.rows[i].cells[5].innerText;
                    linkmanList.push(linkman);
                }
                return linkmanList;
            }

            function checkForm() {
                var checkStr = '';
                $('#supplier').find('input[name]').each(function () {
                    var key = $(this).attr('name');
                    var value = $(this).val();
                    if (key == 'name' && !value) {
                        checkStr = '供应商名字不能为空！';
                        return false;
                    }
                    if (key == 'tel' && !value) {
                        checkStr = '供应商电话不能为空！';
                        return false;
                    }
                });
                return checkStr;
            }

            function checkTable() {
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
            }

            $('#save').on('click', function() {

                /*if (!checkForm() || !checkTable()) {
                    return;
                }*/
                var checkStr = checkForm() || checkTable();
                if (checkStr) {
                    $.alertMessager(checkStr, 'danger');
                    return;
                }

                var linkmanList = getTableData();
                var supplier = getFormData();
                console.log(supplier);
                console.log(linkmanList);
                $.post("<?php echo U('Supplier/supplierEdit');?>", {supplier: supplier, linkmanList: linkmanList}, function(data) {
                    console.log(data);
                    if (!data.status) {
                        $.alertMessager('修改失败', 'danger');
                    } else {
                        $.alertMessager('修改成功', 'success');
                        window.setTimeout(function() {
                            window.location = "<?php echo U('Supplier/index');?>";
                        }, 2000);
                    }
                });
            })

            $('#linkman').on('click', '.add-row', function() {
                var html = '<tr>\
                <td contenteditable="true" name="name"></td>\
                <td contenteditable="true" name="mobile"></td>\
                <td contenteditable="true" name="tel"></td>\
                <td contenteditable="true" name="email"></td>\
                <td contenteditable="true" name="qq"></td>\
                <td contenteditable="true" name="note"></td>\
                <td class="operate"><a class="add-row" title="添加一行" href="javascript:;"><i class="fa fa-plus"></i></a><a title="删除当前行" class="del-row" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>\
                    </tr>';
                $(this).parents('tr').after(html);
            })

            $('#linkman').on('click', '.del-row', function() {
                var num = $(this).parents('#linkman').find('tr').length;
                if (num === 2) {
                    alert('必须保留一行');
                    return;
                }
                var tr = $(this).parents('tr');
                var id = tr.attr('data-id');
                if (!id) {
                    tr.remove();
                } else {
                    var result = confirm('确定要删除当前联系人？');
                    if (result) {
                        $.post("<?php echo U('Supplier/linkmanDel');?>", { id: id }, function(data) {
                            if (data.status) {
                                tr.remove();
                            } else {
                                alert('删除失败');
                            }
                        });
                    }
                }

            })
        });
    </script>

    </div>
</div>

</body></html>